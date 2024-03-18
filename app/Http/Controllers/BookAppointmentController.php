<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SubService;
use App\Models\Appointment;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use App\Models\PaymentChannel;
use App\Actions\CreateUserAction;
use App\Settings\GeneralSettings;
use App\Constants\PaymentChannels;
use App\Actions\CreateAppointmentAction;
use App\Constants\TransactionStatusTypes;
use App\Data\Calendly\CalendlyRedirectData;
use App\Notifications\AdminTransactionCreateNotification;
use App\Notifications\UserConfirmAppointmentNotification;

class BookAppointmentController extends Controller
{
    use UploadFiles;

    public function index($slug)
    {
        $settings = app(GeneralSettings::class);
        $subService = SubService::where('slug', $slug)->first();
        session()->put('subservice', $subService);
        return view('home.book-appointment', [
            'service' => $subService,
            'settings' => $settings,

        ]);
    }

    public function appointmentBooked(Request $request)
    {
        if (session()->get('subservice') == null) {
            toastr()->timeOut(10000)->addError('Please book again.');
            return redirect()->route('home');
        }
        $data = new CalendlyRedirectData(
            $request->query('event_start_time'),
            $request->query('invitee_first_name'),
            $request->query('invitee_last_name'),
            $request->query('invitee_email'),
            $request->query('answer_1'),
            session()->get('subservice')
        );

        $responseData = CreateUserAction::execute($data);
        $appointment = CreateAppointmentAction::execute($data, $responseData->user);

        if (auth()->check() && auth()->user()->role_id > 1) {
            toastr()->timeOut(10000)->addSuccess('Appointment Booked');
            return redirect(roleBasedRoute('appointments.index'));
        }
        if($responseData->status == true){
            toastr()->timeOut(10000)->addSuccess('Login details have been sent to your mail box');
        }
        return redirect()->route('booking.confirm-appointment', $appointment->uuid);
        
        
    }

    public function confirmAppointmentBooking(string $uuid)
    {
        $settings = app(GeneralSettings::class);

        $appointment = Appointment::where('uuid', $uuid)->first();
        if (!$appointment) {
            toastr()->timeOut(10000)->addError('Please book again.');
            return redirect()->back();
        }
        $transaction = $appointment->transaction()->first();
        if ($transaction->status !== TransactionStatusTypes::CREATED->value) {
            toastr()->timeOut(10000)->addError('Please book again.');
            return redirect()->back();
        }

        return view('home.confirm-appointment', [
            'paymentChannels' => PaymentChannel::where('name', '!=', PaymentChannels::ADMIN)->get(),
            'appointment' => $appointment,
            'service' => $appointment->subService()->first(),
            'transaction' => $appointment->transaction()->first(),
            'settings' => $settings,
        ]);
    }

    public function declineAppointmentBooking (string $uuid)
    {
        $appointment = Appointment::where('uuid', $uuid)->first();
        if (!$appointment) {
            toastr()->timeOut(10000)->addError('not Found.');
            return redirect()->route('home');
        }
        $transaction = $appointment->transaction()->first();
        $appointment->transaction()->detach($transaction);
        $appointment->subService()->detach($appointment->subService()->first());


        $appointment->delete();
        $transaction->delete();

        toastr()->timeOut(10000)->addSuccess('Payment Declined and Appointment Cancelled');
        return redirect()->route('home');
    }

    public function confirmAppointmentBookingPayment (Request $request, string $uuid)
    {
        $data = $request->validate([
                'payment_channel_id' => ['required', 'exists:payment_channels,id'],
                'image' => ['nullable', 'file', 'mimes:pdf,docx,jpeg,jpg,png','max:2048'],
            ]);

        $appointment = Appointment::where('uuid', $uuid)->first();
        if (!$appointment) {
            toastr()->timeOut(10000)->addError('not Found.');
            return redirect()->route('home');
        }
        $transaction = $appointment->transaction()->first();
        if ($request->hasFile('image')) {
            $transaction->proof = $this->uploadImage('payment_proof', $request);
        }

        $transaction->status = TransactionStatusTypes::PENDING->value;
        
        $transaction->save();

        User::where('role_id', 3)->each(
            function ($admin) use($transaction) {
                $admin->notify(new AdminTransactionCreateNotification($transaction->user, $admin, $transaction));
            });
        $transaction->user->notify(new UserConfirmAppointmentNotification($transaction->user));
        toastr()->timeOut(10000)->addSuccess('Payment Waiting to be approved');
        return redirect()->route('login');
    }
}

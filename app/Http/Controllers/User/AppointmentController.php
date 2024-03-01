<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Constants\StageTypes;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $userAppointments = $user->load('appointments.subService');
        $completedAppointments = $user->appointments()->whereHas('stage', function ($query) {
            $query->where('name', StageTypes::COMPLETED->value);
        })->whereNotNull('end_time')->count();

        return view('user.appointments.index', [
            'user' => $user->load('appointments.subService'),
            'appointments' => $userAppointments->appointments->whereNull('parent_appointment_id'),
            'completedAppointments' => $completedAppointments,
            'followUpAppointments' => $userAppointments->appointments->whereNotNull('parent_appointment_id'),
            'nextAppointment' => Carbon::parse($user->appointments()
                ->whereNotNull('parent_appointment_id')
                ->whereNull('end_time')
                ->latest('start_time')
                ->value('start_time'))->format('D, jS M, Y'),
        ]);
    }

    /**
     * Display the specified Appointment.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $appointment = Appointment::where('id', $id)->with(['comments', 'subService', 'transaction', 'stage'])->first();

        if (empty($appointment)) {
            toastr()->timeOut(10000)->addError('Appointment not found');

            return redirect()->route('user.appointments.index');
        }

        $comments = $appointment->comments->sortBy('stage_id');

        return view('user.appointments.show', [
            'appointment' => $appointment,
            'comments' => $comments,
        ]);
    }

}

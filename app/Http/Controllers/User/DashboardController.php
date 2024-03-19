<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\TransactionStatusTypes;
use App\Models\Transaction;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $userTransactions = $user->load('transactions.appointment.subService');
        $userAppointments = $user->load('appointments.subService', 'appointments.transaction', 'appointments.stage');
        $nextAppointment = $user->appointments()
                            ->whereNotNull('parent_appointment_id')
                            ->whereNull('end_time')
                            ->latest()
                            ->first();

        // dd(auth()->user()->transactions);
        return view('user.dashboard', [
            'user' => $user->load('appointments.subService', 'appointments.transaction'),
            'appointments' => $userAppointments->appointments->whereNull('parent_appointment_id'),
            'followUpAppointments' => $userAppointments->appointments->whereNotNull('parent_appointment_id'),
            'nextAppointment' => $nextAppointment ?? null,
            'nextAppointmentDate' => Carbon::parse($nextAppointment?->start_time)->format('D, jS M, Y')?? '',
            'transactions' => Transaction::where('user_id', $user->id)->with('appointment.subService')->latest()->get(),
            'initiatedTransactions' => $user->transactions()->where('status', TransactionStatusTypes::CREATED->value)
        ]);
    }
}

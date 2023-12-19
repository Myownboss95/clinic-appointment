<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
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
        return view('user.appointments', [
            'user' => $user->load('appointments.subService'),
            'appointments' => $userAppointments->appointments->whereNull('parent_appointment_id'),
            'followUpAppointments' => $userAppointments->appointments->whereNotNull('parent_appointment_id'),
            'nextAppointment' => Carbon::parse($user->appointments()
                                                    ->whereNotNull('parent_appointment_id')
                                                    ->whereNull('end_time')
                                                    ->latest('start_time')
                                                    ->value('start_time'))->format('D, jS M, Y'),
        ]);
    }
}


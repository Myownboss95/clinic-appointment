<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('user.dashboard', [
            'user' => $user->load('appointments.sub_service','appointments.transaction', 'transactions'),
            'nextAppointment' => Carbon::parse($user->appointments()
                                                    ->whereNotNull('parent_appointment_id')
                                                    ->whereNull('end_time')
                                                    ->latest('start_time')
                                                    ->value('start_time'))->format('D, jS M, Y')
        ]);
    }
}

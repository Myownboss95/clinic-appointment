<?php

namespace App\Http\Controllers\User;

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
        return view('user.dashboard', [
            'user' => $request->user()->load('appointments.sub_service', 'appointments.stage', 'transactions')
        ]);
    }
}

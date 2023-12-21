<?php

namespace App\Http\Controllers\Admin;

use App\Constants\TransactionReasons;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('admin.dashboard' , [
            'customers' => User::where('role_id', 1)->latest(),
            'customers_count' => User::where('role_id', 1)->count(),
            'new_customers_count' => User::where('role_id', 1)
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->count(),
            'appointment' => Appointment::with(['subService', 'stage'])->latest(),
            'follow_up_appointment_count' => Appointment::whereNotNull('parent_appointment_id')->count(),
            'appointment_count' => Appointment::all()->count(),
            'transactions' => Transaction::with(['user','appointment.subservice'])->latest(),
            'transactions_count' => Transaction::count(),
            'total_transactions' => Transaction::sum('amount'),
            'total_referral_transactions' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->sum('amount'),
            'referral_transactions_count' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->count()
            
        ]);
    }
}

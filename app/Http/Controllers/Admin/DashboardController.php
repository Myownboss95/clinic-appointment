<?php

namespace App\Http\Controllers\Admin;

use App\Constants\TransactionReasons;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Transaction;
use App\Models\User;
use App\Settings\GeneralSettings;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GeneralSettings $generalSettings)
    {
        return view('admin.dashboard', [
            'customers' => User::where('role_id', 1)->latest(),
            'customers_count' => User::where('role_id', 1)->count(),
            'new_customers_count' => User::where('role_id', 1)
                ->where('created_at', '>=', Carbon::now()->subWeek())
                ->count(),
            'appointment' => Appointment::with(['subService', 'stage'])->latest(),
            'follow_up_appointment_count' => Appointment::whereNotNull('parent_appointment_id')->count(),
            'appointment_count' => Appointment::all()->count(),
            'transactions' => Transaction::with(['user', 'appointment.subservice'])->latest(),
            'transactions_count' => Transaction::count(),
            'total_transactions' => Transaction::sum('amount'),
            'calendly_last_handshake' => 'Last handshake perfomed at'. ' ' .Carbon::parse($generalSettings->calendly_created_at)->format('l, F j, Y, g:i A'),
            'total_referral_transactions' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->sum('amount'),
            'referral_transactions_count' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->count(),

        ]);
    }
}

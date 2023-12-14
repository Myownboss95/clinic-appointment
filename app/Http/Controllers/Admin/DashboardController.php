<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

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
            'customers' => User::where('role_id', 1)->latest()->get(),
            'new_customers_count' => User::where('role_id', 1)->where('created_at')->count(),
            'transactions' => Transaction::with(['user','appointment.subservice'])->latest(),
            'transactions_count' => Transaction::all()->count(),
            
        ]);
    }
}

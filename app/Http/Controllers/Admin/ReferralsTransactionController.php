<?php

namespace App\Http\Controllers\Admin;

use App\Constants\TransactionReasons;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReferralsTransactionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Transaction::where('reason', TransactionReasons::REFERRALS);

        return view('admin.referrals-transactions.index', [
            'transactions' => $query->with(['user'])->latest(),
            'total_referral_transactions' => $query->sum('amount'),
            'referral_transactions_count' => $query->count(),
        ]);
    }

    public function pendingTransactions(Request $request)
    {
        $query = Transaction::where('reason', TransactionReasons::REFERRALS);

        return view('admin.referrals-transactions.pending-transactions', [
            'transactions' => $query->with(['user'])->latest(),
            'total_referral_transactions' => $query->sum('amount'),
            'referral_transactions_count' => $query->count(),
        ]);
    }

    /**
     * Display the specified Stage.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $transaction = Transaction::where('reason', TransactionReasons::REFERRALS)->with(['user', 'appointment.subservice', 'paymentChannel'])->where('id', $id)->first();

        if (empty($transaction)) {
            toastr()->addError('Transaction not found');

            return redirect(roleBasedRoute('referrals.index'));
        }

        // dd($transaction);
        return view('admin.referrals-transactions.show', [
            'transaction' => $transaction,
        ]);
    }
}

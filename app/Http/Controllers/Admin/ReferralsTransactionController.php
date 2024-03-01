<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ReferralPayoutTransactionAction;
use App\Constants\PaymentChannels;
use App\Constants\TransactionReasons;
use App\Constants\TransactionStatusTypes;
use App\Constants\TransactionTypes;
use App\Data\TransactionData;
use App\Http\Controllers\Controller;
use App\Models\PaymentChannel;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            toastr()->timeOut(10000)->addError('Transaction not found');

            return redirect(roleBasedRoute('referrals.index'));
        }

        // dd($transaction);
        return view('admin.referrals-transactions.show', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * Show the form for editing the specified Appointment.
     *
     * @param  int  $id
     * @return Response
     */
    public function payReferrals(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'current_password'],
        ]);

        if ($validator->fails()) {
            toastr()->timeOut(10000)->addError('Incorrect Password');

            return redirect()->back();
        }
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            toastr()->timeOut(10000)->addError('Transaction not found');

            return redirect()->back();
        }
        $transaction->update([
            'status' => TransactionStatusTypes::CONFIRMED->value,
            'confirmed_by' => $request->user()->id,
        ]);
        $paymentChannel = PaymentChannel::where('bank_name', PaymentChannels::ADMIN->value)->first();
        $transactionData = new TransactionData($transaction->amount,
            TransactionStatusTypes::PAID_REFERRAL,
            TransactionTypes::DEBIT,
            $transaction->user,
            $paymentChannel,
            TransactionReasons::REFERRALS_PAID,
            $request->user()
        );
        ReferralPayoutTransactionAction::execute($transactionData);
        toastr()->timeOut(10000)->addSuccess('Referral Balance Deducted and confirmed by you');

        return redirect()->back();
    }
}

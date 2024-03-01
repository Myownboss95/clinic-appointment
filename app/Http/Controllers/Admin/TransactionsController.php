<?php

namespace App\Http\Controllers\Admin;

use App\Constants\TransactionReasons;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.transactions.index', [
            'transactions' => Transaction::with(['user', 'appointment.subservice'])->latest(),
            'transactions_count' => Transaction::count(),
            'total_transactions' => Transaction::sum('amount'),
            'total_referral_transactions' => Transaction::where('reason', TransactionReasons::REFERRALS)->sum('amount'),
            'referral_transactions_count' => Transaction::where('reason', TransactionReasons::REFERRALS)->count(),
        ]);
    }

    public function pendingTransactions(Request $request)
    {
        return view('admin.transactions.pending-transactions', [
            'transactions' => Transaction::with(['user', 'appointment.subservice'])->latest(),
            'transactions_count' => Transaction::count(),
            'total_transactions' => Transaction::sum('amount'),
            'total_referral_transactions' => Transaction::where('reason', TransactionReasons::REFERRALS)->sum('amount'),
            'referral_transactions_count' => Transaction::where('reason', TransactionReasons::REFERRALS)->count(),
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
        $transaction = Transaction::with(['user', 'appointment.subservice', 'paymentChannel'])->where('id', $id)->first();

        if (empty($transaction)) {
            toastr()->timeOut(10000)->addError('Transaction not found');

            return redirect(roleBasedRoute('transactions'));
        }

        // dd($transaction);
        return view('admin.transactions.show', [
            'transaction' => $transaction,
        ]);
    }

    public function downloadProof(string $ref)
    {
        $transaction = Transaction::where('ref', $ref)->first();
        if (empty($transaction->proof)) {
            toastr()->timeOut(10000)->addError('File not found');
            return redirect()->back();
        }

        $storagePath = storage_path('app/public/payment_proof/' . $transaction->proof);

        return response()->download($storagePath);
    }


    // /**
    //  * Update the specified Appointment in storage.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function update($id, UpdateAppointmentRequest $request)
    // {
    //     // $appointment = $this->appointmentRepository->find($id);

    //     // if (empty($appointment)) {

    //     //     toastr()->timeOut(10000)->addError('urrency List saved successfully.');
    //     //     return redirect(roleBasedRoute('appointments.index'));
    //     // }

    //     // $appointment = $this->appointmentRepository->update($request->all(), $id);

    //     // toastr()->timeOut(10000)->addSuccess('Appointment updated successfully.');

    //     // return redirect(roleBasedRoute('appointments.index'));
    // }

    // /**
    //  * Remove the specified Appointment from storage.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  *
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     // $appointment = $this->appointmentRepository->find($id);

    //     // if (empty($appointment)) {
    //     //     toastr()->timeOut(10000)->addError('Appointment not found');
    //     //     return redirect(roleBasedRoute('appointments.index'));
    //     // }

    //     // $this->appointmentRepository->delete($id);

    //     // toastr()->timeOut(10000)->addSuccess('Appointment saved successfully.');

    //     // return redirect(roleBasedRoute('appointments.index'));
    // }
}

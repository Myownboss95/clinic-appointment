<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\TransactionReasons;

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
            'transactions' => Transaction::with(['user','appointment.subservice'])->latest(),
            'transactions_count' => Transaction::count(),
            'total_transactions' => Transaction::sum('amount'),
            'total_referral_transactions' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->sum('amount'),
            'referral_transactions_count' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->count()
        ]);
    }

     /**
     * Display the specified Stage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $transaction = Transaction::with(['user','appointment.subservice','paymentChannel'])->where('id', $id)->first();
        // dd($transaction);
        return view('admin.transactions.show', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * Show the form for editing the specified Appointment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = Transaction::with(['user','appointment.subservice'])->where('id', $id)->first();

        if (empty($transaction)) {
            toastr()->addError('Appointment not found');

            return redirect(roleBasedRoute('transactions.index'));
        }

        return view('admin.transactions.edit',
        [
            'transaction'=> $transaction
        ]);
    }

    /**
     * Update the specified Appointment in storage.
     *
     * @param int $id
     * @param UpdateAppointmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppointmentRequest $request)
    {
        // $appointment = $this->appointmentRepository->find($id);

        // if (empty($appointment)) {
            

        //     toastr()->addError('urrency List saved successfully.');
        //     return redirect(roleBasedRoute('appointments.index'));
        // }

        // $appointment = $this->appointmentRepository->update($request->all(), $id);

        // toastr()->addSuccess('Appointment updated successfully.');

        // return redirect(roleBasedRoute('appointments.index'));
    }

    /**
     * Remove the specified Appointment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        // $appointment = $this->appointmentRepository->find($id);

        // if (empty($appointment)) {
        //     toastr()->addError('Appointment not found');
        //     return redirect(roleBasedRoute('appointments.index'));
        // }

        // $this->appointmentRepository->delete($id);

        // toastr()->addSuccess('Appointment saved successfully.');

        // return redirect(roleBasedRoute('appointments.index'));
    }
}



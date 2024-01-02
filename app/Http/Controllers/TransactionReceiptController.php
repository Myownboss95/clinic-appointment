<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionReceiptController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $bot
     * @return \Illuminate\Http\Response
     */
    public function __invoke($ref)
    {

        $transaction = Transaction::where('ref', $ref)->with(['appointment.subService', 'user', 'paymentChannel'])->first();
        $user = $transaction->user;
        if (! $transaction) {
            toastr()->addError('Transaction not found');
        }
        $pdf = Pdf::loadView('user.transactions.reciept', compact('transaction', 'user'))->setPaper('a5', 'portrait');

        return $pdf->download();
    }
}

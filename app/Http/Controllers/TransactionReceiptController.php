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
    public function __invoke($uuid)
    {

        $transaction = Transaction::where('ref', $uuid)->with('appointment.subService')->first();
        if (!$transaction) {
            toastr()->addError('Transaction not found');
        }
        $pdf = Pdf::loadView('user.transactions.reciept', compact('transaction'))->setPaper('a2', 'landscape');

        return $pdf->download();
    }
}

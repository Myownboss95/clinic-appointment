<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return view('user.transaction', [
            'user' => $user->load('transactions'),
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
        $user = $request->user();
        $transaction = $user->transaction()->where('id', $id)->first();
        return view('admin.stages.show', [
            'user' => $user,
            'transaction' => $transaction,
        ]);
    }


    public function showTransaction(Request $request, $id)
    {
        //$user = $request->user();
        $transaction = Transaction::where('id', $id)->first();
        return view('user.transactions.show', [
            // 'user' => $user,
            'transaction' => $transaction,
        ]);
    }
}


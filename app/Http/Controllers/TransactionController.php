<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use BarryvdhDomPDF as PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function printingAll(Request $request)
    {
        $transactions = Transaction::all();

        $pdf = PDF::loadView('transactions.printing.transactions', compact('transactions'));
        //$pdf->setOptions(array('isRemoteEnabled' => true));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/transactions.pdf"));

        return $pdf->stream('transactions.pdf');
    }

    public function printingOne(Request $request, Transaction $transaction)
    {
        $pdf = PDF::loadView('transactions.printing.transaction', compact('transaction'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/transaction_{$transaction->id}.pdf"));

        return $pdf->stream('transaction.pdf');
    }
}

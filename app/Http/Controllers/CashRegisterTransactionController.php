<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\CashRegister;
use App\Models\DayTransaction;
use App\Models\CashRegisterTransaction;
use Illuminate\Http\Request;

class CashRegisterTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashRegisterTransactions = CashRegisterTransaction::all();

        return view('cash_register_transactions.index', compact('cashRegisterTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dayTransactions = DayTransaction::all()->pluck(null, 'id');
        $staffs = Staff::with('human.user')->get()->pluck('human.user.full_name', 'id');
        $cashRegisters = CashRegister::all()->pluck(null, 'id');

        return view('cash_register_transactions.create', compact('dayTransactions', 'staffs', 'cashRegisters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'day_transaction_id' => ['required'],
                'staff_id' => ['required'],
                'cash_register_id' => ['required'],
                'state' => ['required'],
            ]);

            $dayTransaction = DayTransaction::findOrFail($request->input('day_transaction_id'));
            $lastCashRegisterTransaction = CashRegisterTransaction::where([
                'day_transaction_id' => $dayTransaction->id,
                'staff_id' => $request->input('staff_id'),
            ])
            ->orderBy('id', 'DESC')
            ->first();

            if ($lastCashRegisterTransaction) {
                if ($lastCashRegisterTransaction->state == false) {
                    $cashRegisterTransaction = CashRegisterTransaction::create(array_merge(
                        $request->all(),
                        [
                            'amount' => $lastCashRegisterTransaction->amount,
                        ]
                    ));

                    session()->flash('info', "Transaction de caisse ouverte");
                } else {
                    session()->flash('warning', "Une autre transaction de caisse est déjà en cours");
                }
            } else {
                $cashRegisterTransaction = CashRegisterTransaction::create(array_merge(
                    $request->all(),
                    [
                        'amount' => 0,
                    ]
                ));

                session()->flash('primary', "Transaction de caisse ouverte");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashRegisterTransaction  $cashRegisterTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(CashRegisterTransaction $cashRegisterTransaction)
    {
        return view('cash_register_transactions.show', compact('cashRegisterTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashRegisterTransaction  $cashRegisterTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(CashRegisterTransaction $cashRegisterTransaction)
    {
        $dayTransactions = DayTransaction::all()->pluck(null, 'id');
        $staffs = Staff::with('human.user')->get()->pluck('human.user.full_name', 'id');
        $cashRegisters = CashRegister::all()->pluck(null, 'id');

        return view('cash_register_transactions.edit', compact('dayTransactions', 'staffs', 'cashRegisters', 'cashRegisterTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashRegisterTransaction  $cashRegisterTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashRegisterTransaction $cashRegisterTransaction)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'day_transaction_id' => ['required'],
                'staff_id' => ['required'],
                'cash_register_id' => ['required'],
                'state' => ['required'],
            ]);

            dd($request->all());
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashRegisterTransaction  $cashRegisterTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashRegisterTransaction $cashRegisterTransaction)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BankOperation;
use App\Models\Bank;
use App\Models\BankOperationType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBankOperationRequest;
use App\Http\Requests\UpdateBankOperationRequest;

class BankOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankOperations = BankOperation::all();

        return view('bank_operations.index', compact('bankOperations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all()->pluck(null, 'id');

        $bankOperationTypes = BankOperationType::all()->pluck(null, 'id');

        return view('bank_operations.create', compact('banks', 'bankOperationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->isMethod('post')) {

            $this->_validateRequest($request);

            $bankOperation = BankOperation::create($request->all());

            $this->updateStaffStatusBarInfo(
                $bankOperation->amount,
                ($bankOperation->bank_operation_type->state == 1) ? '+' : '-'
            );

            if ($bankOperation) {
                session()->flash('success', "Donnée enregistrée");
            } else {
                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankOperation  $bankOperation
     * @return \Illuminate\Http\Response
     */
    public function show(BankOperation $bankOperation)
    {
        return view('bank_operations.show', compact('bankOperation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankOperation  $bankOperation
     * @return \Illuminate\Http\Response
     */
    public function edit(BankOperation $bankOperation)
    {
        $banks = Bank::all()->pluck(null, 'id');
        
        $bankOperationTypes = BankOperationType::all()->pluck(null, 'id');

        return view('bank_operations.edit', compact('bankOperation', 'banks', 'bankOperationTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankOperation  $bankOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankOperation $bankOperation)
    {

        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            /*$this->updateStaffStatusBarInfo(
                $bankOperation->amount,
                ($bankOperation->bank_operation_type->state == 1) ? '-' : '+'
            );*/

            $bankOperation->update($request->only('bank_id', 'comment'));

            /*$this->updateStaffStatusBarInfo(
                $bankOperation->amount,
                ($bankOperation->bank_operation_type->state == 1) ? '+' : '-'
            );*/

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankOperation  $bankOperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankOperation $bankOperation)
    {
        $bankOperation->delete();

        return back()->withDanger('Donnée supprimée');
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function _validateRequest($request)
    {
        $request->validate([
            'bank_operation_type_id' => ['required'],
            'bank_id' => ['required'],
            'amount' => ['required'],
            'comment' => ['nullable'],
        ]);
    }
}

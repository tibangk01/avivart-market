<?php

namespace App\Http\Controllers;

use App\Models\CashRegisterOperation;
use App\Models\CashRegisterOperationType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCashRegisterOperationRequest;
use App\Http\Requests\UpdateCashRegisterOperationRequest;

class CashRegisterOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashRegisterOperations = CashRegisterOperation::all();

        return view('cash_register_operations.index', compact('cashRegisterOperations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cashRegisterOperationTypes = CashRegisterOperationType::all()->pluck(null, 'id');

        return view('cash_register_operations.create', compact('cashRegisterOperationTypes'));
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

            $cashRegisterOperation = CashRegisterOperation::create($request->all());

            $this->updateStaffStatusBarInfo(
                $cashRegisterOperation->amount,
                ($cashRegisterOperation->cash_register_operation_type->state == 1) ? '+' : '-'
            );

            if ($cashRegisterOperation) {
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
     * @param  \App\Models\CashRegisterOperation  $cashRegisterOperation
     * @return \Illuminate\Http\Response
     */
    public function show(CashRegisterOperation $cashRegisterOperation)
    {
        return view('cash_register_operations.show', compact('cashRegisterOperation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashRegisterOperation  $cashRegisterOperation
     * @return \Illuminate\Http\Response
     */
    public function edit(CashRegisterOperation $cashRegisterOperation)
    {
        $cashRegisterOperationTypes = CashRegisterOperationType::all()->pluck(null, 'id');

        return view('cash_register_operations.edit', compact('cashRegisterOperation', 'cashRegisterOperationTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashRegisterOperation  $cashRegisterOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashRegisterOperation $cashRegisterOperation)
    {

        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            /*$this->updateStaffStatusBarInfo(
                $cashRegisterOperation->amount,
                ($cashRegisterOperation->cash_register_operation_type->state == 1) ? '-' : '+'
            );*/

            $cashRegisterOperation->update($request->only('comment'));

            /*$this->updateStaffStatusBarInfo(
                $cashRegisterOperation->amount,
                ($cashRegisterOperation->cash_register_operation_type->state == 1) ? '+' : '-'
            );*/

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashRegisterOperation  $cashRegisterOperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashRegisterOperation $cashRegisterOperation)
    {
        //$cashRegisterOperation->delete();

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
            'cash_register_operation_type_id' => ['required'],
            'amount' => ['required'],
            'comment' => ['nullable'],
        ]);
    }
}

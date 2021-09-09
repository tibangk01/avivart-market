<?php

namespace App\Http\Controllers;

use App\Models\CashRegisterOperationType;
use Illuminate\Http\Request;

class CashRegisterOperationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashRegisterOperationTypes = CashRegisterOperationType::all();

        return view('cash_register_operation_types.index', compact('cashRegisterOperationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cash_register_operation_types.create');
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

            $cashRegisterOperationType = CashRegisterOperationType::create($request->all());

            if ($cashRegisterOperationType) {

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
     * @param  \App\Models\CashRegisterOperationType  $cashRegisterOperationType
     * @return \Illuminate\Http\Response
     */
    public function show(CashRegisterOperationType $cashRegisterOperationType)
    {
        return view('cash_register_operation_types.show', compact('cashRegisterOperationType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashRegisterOperationType  $cashRegisterOperationType
     * @return \Illuminate\Http\Response
     */
    public function edit(CashRegisterOperationType $cashRegisterOperationType)
    {
        return view('cash_register_operation_types.edit', compact('cashRegisterOperationType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashRegisterOperationType  $cashRegisterOperationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashRegisterOperationType $cashRegisterOperationType)
    {
        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            $cashRegisterOperationType->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashRegisterOperationType  $cashRegisterOperationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashRegisterOperationType $cashRegisterOperationType)
    {
        //
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
            'name' => ['required', 'min:3', 'max:30'],
            'is_opening' => ['required'],
        ]);
    }
}

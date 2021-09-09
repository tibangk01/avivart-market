<?php

namespace App\Http\Controllers;

use App\Models\CashRegister;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashRegisters = CashRegister::all();

        return view('cash_registers.index', compact('cashRegisters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cash_registers.create');
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

            $cashRegister = CashRegister::create($request->only('name'));

            if ($cashRegister) {

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
     * @param  \App\Models\CashRegister  $cashRegister
     * @return \Illuminate\Http\Response
     */
    public function show(CashRegister $cashRegister)
    {
        return view('cash_registers.show', compact('cashRegister'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashRegister  $cashRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(CashRegister $cashRegister)
    {
        return view('cash_registers.edit', compact('cashRegister'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashRegister  $cashRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashRegister $cashRegister)
    {
        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            $cashRegister->update($request->only('name'));

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashRegister  $cashRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashRegister $cashRegister)
    {
        //
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param mixed $request
     * @return void
     */
    private function _validateRequest($request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
        ]);
    }
}

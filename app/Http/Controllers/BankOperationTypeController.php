<?php

namespace App\Http\Controllers;

use App\Models\BankOperationType;
use Illuminate\Http\Request;

class BankOperationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankOperationTypes = BankOperationType::all();

        return view('bank_operation_types.index', compact('bankOperationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank_operation_types.create');
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

            $bankOperationType = BankOperationType::create($request->all());

            if ($bankOperationType) {

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
     * @param  \App\Models\BankOperationType  $bankOperationType
     * @return \Illuminate\Http\Response
     */
    public function show(BankOperationType $bankOperationType)
    {
        return view('bank_operation_types.show', compact('bankOperationType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankOperationType  $bankOperationType
     * @return \Illuminate\Http\Response
     */
    public function edit(BankOperationType $bankOperationType)
    {
        return view('bank_operation_types.edit', compact('bankOperationType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankOperationType  $bankOperationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankOperationType $bankOperationType)
    {
        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            $bankOperationType->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankOperationType  $bankOperationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankOperationType $bankOperationType)
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
            'state' => ['required'],
        ]);
    }
}

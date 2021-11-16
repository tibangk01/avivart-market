<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContractTypeRequest;
use App\Http\Requests\UpdateContractTypeRequest;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractTypes = ContractType::all();

        return view('contract_types.index', compact('contractTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contract_types.create');
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

            $contractType = ContractType::create($request->only('name'));

            if ($contractType) {

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
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function show(ContractType $contractType)
    {
        return view('contract_types.show', compact('contractType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractType $contractType)
    {
        return view('contract_types.edit', compact('contractType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractType $contractType)
    {
        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            $contractType->update($request->only('name'));

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $contractType)
    {
        $contractType->delete();

        return back()->withDanger('Donnée supprimée');
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

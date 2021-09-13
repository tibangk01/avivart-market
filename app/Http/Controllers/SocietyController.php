<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\Country;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        return view('societies.show', compact('society'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function edit(Society $society)
    {
        $countries = Country::all()->pluck(null, 'id');

        return view('societies.edit', compact('society', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Society $society)
    {
        if($request->isMethod('put'))
        {
            $this->validate($request, [
                'country_id' => ['required'],
                'name' => ['required', 'min:3'],
                'phone_number' => ['required', 'min:3'],
                'email' => ['required', 'min:3'],
                'tppcr' => ['required', 'min:3'],
                'fiscal_code' => ['required', 'min:3'],
                'address' => ['max:50'],
                'city' => ['max:30'],
            ]);

            $society->enterprise->update($request->except('tppcr', 'fiscal_code'));

            $society->update($request->only('tppcr', 'fiscal_code'));

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }
}

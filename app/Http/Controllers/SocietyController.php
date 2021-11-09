<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;

class SocietyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $societies = Society::all();

        return view('societies.index', compact('societies'));
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
        $regions = Region::all()->pluck(null, 'id');

        return view('societies.edit', compact('society', 'countries', 'regions'));
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
            
            $this->_validateRequest($request, 'put');

            try {

                DB::beginTransaction();
                $region = Region::findOrFail($request->region_id);

                $society->enterprise->update(array_merge(
                    $request->except('tppcr', 'fiscal_code'),
                    [
                        'code' => $region->code . '000',
                    ]
                ));

                $society->update($request->only('tppcr', 'fiscal_code'));

                DB::commit();

                session()->flash('success', 'Modification réussi');
            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param mixed $request
     * @return void
     */
    private function _validateRequest(Request $request, string $method)
    {
        $formData = [
            'country_id' => ['required'],
            'region_id' => ['required'],
            'name' => ['required', 'min:3'],
            'phone_number' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'tppcr' => ['required', 'min:3'],
            'fiscal_code' => ['required', 'min:3'],
            'address' => ['nullable', 'max:50'],
            'city' => ['nullable', 'max:50'],
            'postal_code' => ['nullable', 'max:10'],
        ];

        if(mb_strtolower($method) == 'post'){
            $formData += [
            ];
        }

        $request->validate($formData);
    }

    public function printingOne(Request $request, Society $society)
    {
        $pdf = PDF::loadView('societies.printing.society', compact('society'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/society_{$society->id}.pdf"));

        return $pdf->stream("society_{$society->id}.pdf");
    }
}

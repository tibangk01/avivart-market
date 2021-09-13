<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\SalePlace;
use Illuminate\Http\Request;
use App\Models\Enterprise;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class SalePlaceController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salePlaces = SalePlace::all();

        return view('sale_places.index', compact('salePlaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all()->load('enterprise')->pluck('enterprise.name', 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('sale_places.create', compact('agencies', 'countries'));
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
                'country_id' => ['required'],
                'agency_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'phone_number' => ['required', 'min:8'],
                'email' => ['required', 'email', 'max:60'],
                'website' => ['required', 'max:60'],
                'address' => ['max:50'],
                'city' => ['max:30'],
            ]);

            try {

                DB::beginTransaction();

                $agency = Agency::findOrFail($request->agency_id);

                //get the last sale place in database : very important here
                $salePlace = SalePlace::orderBy('id', 'DESC')->first();

                $code = 1;

                if ($salePlace) {
                    $code = ++$salePlace->enterprise->code;
                }

                $enterprise = Enterprise::create(array_merge($request->all(),
                    [
                        'region_id' => $agency->region_id,
                        'code' => $agency->code . self::BEGIN_CODE . $code,
                        'is_corporation' => false,
                    ]
                ));

                $sale_place = SalePlace::create([
                    'enterprise_id' => $enterprise->id,
                    'agency_id' => $agency->id,
                ]);

               DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

            } catch (\Throwable $th) {

                DB::rollBack();

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function show(SalePlace $salePlace)
    {
        return view('sale_places.show', compact('salePlace'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function edit(SalePlace $salePlace)
    {
        $agencies = Agency::all()->load('enterprise')->pluck('enterprise.name', 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('sale_places.edit', compact('agencies', 'countries', 'salePlace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalePlace $salePlace)
    {
        if ($request->isMethod('PUT')) {

            $request->validate([
                'country_id' => ['required'],
                'agency_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'phone_number' => ['required', 'min:8'],
                'email' => ['required', 'email', 'max:60'],
                'website' => ['required', 'max:60'],
                'address' => ['max:50'],
                'city' => ['max:30'],
            ]);

            $salePlace->enterprise->update($request->except('agency_id'));

            //$salePlace->update($request->only('agency_id'));

            session()->flash('success', 'Modification réussi');

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalePlace $salePlace)
    {
        //
    }
}

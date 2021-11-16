<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\SalePlace;
use Illuminate\Http\Request;
use App\Models\Enterprise;
use App\Models\Country;
use App\Models\Region;
use App\Models\Library;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;

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
        $agencies = Agency::with('enterprise')->get()->pluck('enterprise.name', 'id');
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

            $this->_validateRequest($request, 'post');

            try {

                DB::beginTransaction();

                $agency = Agency::findOrFail($request->agency_id);

                $queryModel = $agency->sale_places->load('enterprise')->where('enterprise.region_id', $agency->enterprise->region_id);

                $code = $queryModel->count()
                    ? $queryModel->count() + 1
                    : 1;
                $code = ($code < 10) ? '0' . $code : $code;

                $library = Library::create([
                    'library_type_id' => 1,
                    'folder' => 'sale_places',
                    'local' => 'logo.png',
                    'remote' => env('UPLOADS_PATH') .'images/sale_places/logo.png',
                ]);

                $enterprise = Enterprise::create(array_merge(
                    $request->all(),
                    [
                        'library_id' => $library->id,
                        'region_id' => $agency->enterprise->region_id,
                        'code' => $agency->enterprise->code . $code,
                        'is_corporation' => false,
                    ]
                ));

                $salePlace = SalePlace::create([
                    'enterprise_id' => $enterprise->id,
                    'agency_id' => $agency->id,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

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
        $agencies = Agency::with('enterprise')->get()->pluck('enterprise.name', 'id');
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

            $this->_validateRequest($request, 'put');

             try {

                DB::beginTransaction();

                $agency = Agency::findOrFail($request->agency_id);

                $queryModel = $agency->sale_places->load('enterprise')->where('enterprise.region_id', $agency->enterprise->region_id);

                $code = $queryModel->count()
                    ? $queryModel->count() + 1
                    : 1;
                $code = ($code < 10) ? '0' . $code : $code;

                $salePlace->enterprise->update(array_merge(
                    $request->except('agency_id'),
                    [
                        'code' => $agency->enterprise->code . $code,
                    ]
                ));

                $salePlace->update($request->only('agency_id'));

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalePlace $salePlace)
    {
        //$salePlace->delete();

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
    private function _validateRequest(Request $request, string $method)
    {
        $formData = [
            'country_id' => ['required'],
            'agency_id' => ['required'],
            'name' => ['required', 'min:3', 'max:50'],
            'phone_number' => ['required', 'min:8'],
            'email' => ['required', 'email', 'max:40'],
            'website' => ['required', 'max:60'],
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

    public function printingAll(Request $request)
    {
        $salePlaces = SalePlace::all();

        $pdf = PDF::loadView('sale_places.printing.sale_places', compact('salePlaces'));
        //$pdf->setOptions(array('isRemoteEnabled' => true));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/sale_places.pdf"));

        return $pdf->stream('sale_places.pdf');
    }

    public function printingOne(Request $request, SalePlace $salePlace)
    {
        $pdf = PDF::loadView('sale_places.printing.sale_place', compact('salePlace'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/sale_place_{$salePlace->id}.pdf"));

        return $pdf->stream("sale_place_{$salePlace->id}.pdf");
    }
}

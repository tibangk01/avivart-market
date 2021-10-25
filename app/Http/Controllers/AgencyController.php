<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Region;
use App\Models\Enterprise;
use App\Models\Country;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;

class AgencyController extends Controller
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
        $agencies = Agency::all();

        return view('agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all()->pluck(null, 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('agencies.create', compact('regions', 'countries'));
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

                $region = Region::findOrFail($request->region_id);

                $code = Agency::with('enterprise')->where('enterprise.region_id', $region->id)->count()
                    ? Agency::with('enterprise')->where('enterprise.region_id', $region->id)->count() + 1
                    : 1;
                $code = ($code < 10) ? '0' . $code : $code;

                $library = Library::create([
                    'library_type_id' => 1,
                    'folder' => 'agencies',
                    'local' => 'logo.png',
                    'remote' => env('UPLOADS_PATH') .'images/agencies/logo.png',
                ]);

                $enterprise = Enterprise::create(array_merge(
                    $request->all(),
                    [
                        'library_id' => $library->id,
                        'code' => $region->code . '0' . $code,
                        'is_corporation' => false,
                    ]
                ));

                $agency = Agency::create([
                    'enterprise_id' => $enterprise->id,
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
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        return view('agencies.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        $regions = Region::all()->pluck(null, 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('agencies.edit', compact('regions', 'countries', 'agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {
        if ($request->isMethod('PUT')) {

            $this->_validateRequest($request, 'put');

            try {

                DB::beginTransaction();

                $region = Region::findOrFail($request->region_id);

                $code = Agency::with('enterprise')->where('enterprise.region_id', $region->id)->count()
                    ? Agency::with('enterprise')->where('enterprise.region_id', $region->id)->count() + 1
                    : 1;
                $code = ($code < 10) ? '0' . $code : $code;

                $agency->enterprise->update(array_merge(
                    $request->all(),
                    [
                        'code' => $region->code . '0' . $code,
                    ]
                ));

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
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
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
    private function _validateRequest(Request $request, string $method)
    {
        $formData = [
            'country_id' => ['required'],
            'region_id' => ['required'],
            'name' => ['required', 'min:3', 'max:50'],
            'phone_number' => ['required', 'min:8'],
            'email' => ['required', 'email', 'max:40'],
            'website' => ['nullable', 'max:50'],
            'address' => ['nullable', 'max:50'],
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
        $agencies = Agency::all();

        $pdf = PDF::loadView('agencies.printing.agencies', compact('agencies'));
        //$pdf->setOptions(array('isRemoteEnabled' => true));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/agencies.pdf"));

        return $pdf->stream('agencies.pdf');
    }

    public function printingOne(Request $request, Agency $agency)
    {
        $pdf = PDF::loadView('agencies.printing.agency', compact('agency'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/agency_{$agency->id}.pdf"));

        return $pdf->stream('agency.pdf');
    }
}

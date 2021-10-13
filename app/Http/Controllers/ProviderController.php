<?php

namespace App\Http\Controllers;

use App\Models\Corporation;
use App\Models\Person;
use App\Models\Enterprise;
use App\Models\User;
use App\Models\Provider;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
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
        return view('providers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
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
            if ($request->has('form')) {
                switch ($request->form) {
                    case 'corporation':
                        $this->_validateProviderCorporationRequest($request, 'post');
                        break;
                    
                    default:
                        $this->_validateProviderIndividualRequest($request, 'post');
                        break;
                }

                try {

                    DB::beginTransaction();

                    switch ($request->form) {
                        case 'corporation':

                            $library = Library::create([
                                'library_type_id' => 1,
                                'folder' => 'providers',
                                'local' => 'logo.png',
                                'remote' => env('UPLOADS_PATH') .'images/providers/logo.png',
                            ]);
                            
                            $enterprise = Enterprise::create(array_merge(
                                $request->except('person_ray_id', 'tppcr', 'fiscal_code'),
                                [
                                    'library_id' => $library->id,
                                    'code' => mb_strtoupper(mb_substr(sha1(uniqid()), 0, 6)),
                                    'is_corporation' => true,
                                ]
                            ));

                            $corporation = Corporation::create(array_merge(
                                $request->only('tppcr', 'fiscal_code'),
                                [
                                    'enterprise_id' => $enterprise->id,
                                ]
                            ));

                            Provider::create(array_merge(
                                $request->only('person_ray_id'),
                                [
                                    'person_type_id' => 1,
                                    'corporation_id' => $corporation->id,
                                ] 
                            ));

                            break;
                        
                        default:

                            $library = Library::create([
                                'library_type_id' => 1,
                                'folder' => 'providers',
                                'local' => 'man.png',
                                'remote' => env('UPLOADS_PATH') .'images/providers/man.png',
                            ]);
                            
                            $user = User::create(array_merge(
                                $request->except('person_ray_id'),
                                [
                                    'library_id' => $library->id,
                                    'user_type_id' => 4,
                                ]
                            ));

                            $person = Person::create( [
                                'user_id' => $user->id,
                            ]);

                            Provider::create(array_merge(
                                $request->only('person_ray_id'),
                                [
                                    'person_type_id' => 2,
                                    'person_id' => $person->id,
                                ] 
                            ));

                            break;
                    }

                    DB::commit();

                    session()->flash('success', 'Donnée enregistrée.');

                } catch (\Throwable $th) {

                    DB::rollBack();

                    //dd($th);

                    session()->flash('error', "Une erreur s'est produite");
                }
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    { 
        return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        if ($request->isMethod('PUT')) {
             if ($request->has('form')) {
                switch ($request->form) {
                    case 'corporation':
                        $this->_validateProviderCorporationRequest($request, 'put');
                        break;
                    
                    default:
                        $this->_validateProviderIndividualRequest($request, 'put');
                        break;
                }

                try {

                    DB::beginTransaction();

                    switch ($request->form) {
                        case 'corporation':
                            
                            $provider->corporation->enterprise->update($request->except('person_ray_id', 'tppcr', 'fiscal_code'));

                            $provider->corporation->update($request->only('tppcr', 'fiscal_code'));

                            $provider->update($request->only('person_ray_id'));

                            break;
                        
                        default:
                            
                            $provider->person->user->update($request->except('person_ray_id'));

                            //$provider->person->update([]);

                            $provider->update($request->only('person_ray_id'));

                            break;
                    }

                    DB::commit();

                    session()->flash('success', 'Modification réussi');

                } catch (\Throwable $th) {

                    DB::rollBack();

                    //dd($th);

                    session()->flash('error', "Une erreur s'est produite");
                }
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
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
    private function _validateProviderCorporationRequest(Request $request, string $method)
    {
        $formData = [
            'country_id' => ['required'],
            'region_id' => ['required'],
            'person_ray_id' => ['required'],
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
                'tppcr' => ['required', 'min:3', 'unique:corporations'],
                'fiscal_code' => ['required', 'min:3', 'unique:corporations'],
            ];
        }

        $request->validate($formData);
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param mixed $request
     * @return void
     */
    private function _validateProviderIndividualRequest(Request $request, string $method)
    {
        $formData = [
            'country_id' => ['required'],
            'civility_id' => ['required'],
            'person_ray_id' => ['required'],
            'first_name' => ['required', 'min:3', 'max:25'],
            'last_name' => ['required', 'min:3', 'max:25'],
            'phone_number' => ['required', 'min:8'],
            'email' => ['required', 'email', 'max:40'],
            'address' => ['nullable', 'max:50'],
            'city' => ['nullable', 'max:50'],
        ];

        if(mb_strtolower($method) == 'post'){
            $formData += [
            ];
        }

        $request->validate($formData);
    }
}

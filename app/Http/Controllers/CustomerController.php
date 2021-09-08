<?php

namespace App\Http\Controllers;

use App\Models\Corporation;
use App\Models\Person;
use App\Models\Enterprise;
use App\Models\User;
use App\Models\Customer;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
                        $request->validate([
                            'region_id' => ['required'],
                            'person_ray_id' => ['required'],
                            'name' => ['required', 'min:3', 'max:50'],
                            'phone_number' => ['required', 'min:8'],
                            'email' => ['required', 'email', 'max:60'],
                            'website' => ['required', 'max:60'],
                            'address' => ['required', 'max:40'],
                            'tppcr' => ['required', 'min:3'],
                            'fiscal_code' => ['required', 'min:3'],
                        ]);
                        break;
                    
                    default:
                        $request->validate([
                            'civility_id' => ['required'],
                            'person_ray_id' => ['required'],
                            'first_name' => ['required', 'min:3', 'max:25'],
                            'last_name' => ['required', 'min:3', 'max:25'],
                            'phone_number' => ['required', 'min:8'],
                            'email' => ['required', 'email', 'max:40'],
                        ]);
                        break;
                }

                try {

                    DB::beginTransaction();

                    switch ($request->form) {
                        case 'corporation':
                            
                            $enterprise = Enterprise::create(array_merge(
                                $request->except('person_ray_id', 'tppcr', 'fiscal_code'),
                                [
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

                            Customer::create(array_merge(
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
                                'folder' => 'customers',
                                'local' => 'default.png',
                                'remote' => env('UPLOADS_PATH') .'images/customers/default.png',
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

                            Customer::create(array_merge(
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

                    session()->flash('error', "Une erreur s'est produite");
                }
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if ($request->isMethod('PUT')) {
             if ($request->has('form')) {
                switch ($request->form) {
                    case 'corporation':
                        $request->validate([
                            'region_id' => ['required'],
                            'person_ray_id' => ['required'],
                            'name' => ['required', 'min:3', 'max:50'],
                            'phone_number' => ['required', 'min:8'],
                            'email' => ['required', 'email', 'max:60'],
                            'website' => ['required', 'max:60'],
                            'address' => ['required', 'max:40'],
                            'tppcr' => ['required', 'min:3'],
                            'fiscal_code' => ['required', 'min:3'],
                        ]);
                        break;
                    
                    default:
                        $request->validate([
                            'civility_id' => ['required'],
                            'person_ray_id' => ['required'],
                            'first_name' => ['required', 'min:3', 'max:25'],
                            'last_name' => ['required', 'min:3', 'max:25'],
                            'phone_number' => ['required', 'min:8'],
                            'email' => ['required', 'email', 'max:40'],
                        ]);
                        break;
                }

                try {

                    DB::beginTransaction();

                    switch ($request->form) {
                        case 'corporation':
                            
                            $customer->corporation->enterprise->update($request->except('person_ray_id', 'tppcr', 'fiscal_code'));

                            $customer->corporation->update($request->only('tppcr', 'fiscal_code'));

                            $customer->update($request->only('person_ray_id'));

                            break;
                        
                        default:
                            
                            $customer->person->user->update($request->except('person_ray_id'));

                            //$customer->person->update([]);

                            $customer->update($request->only('person_ray_id'));
                            
                            break;
                    }

                    DB::commit();

                    session()->flash('success', 'Modification réussi');

                } catch (\Throwable $th) {

                    DB::rollBack();

                    session()->flash('error', "Une erreur s'est produite");
                }
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

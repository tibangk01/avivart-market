<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Human;
use App\Models\Staff;
use App\Helpers\Helper;
use App\Models\Library;
use App\Models\Civility;
use App\Models\StaffType;
use App\Models\Work;
use App\Models\Role;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();

        return view('staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $civilities = Civility::all()->pluck(null, 'id');
        $staffTypes = StaffType::all()->pluck(null, 'id');
        $works = Work::all()->pluck(null, 'id');
        $roles = Role::all()->pluck(null, 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('staffs.create', compact('civilities', 'staffTypes', 'works', 'roles', 'countries'));
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

            $this->_validateRequest($request, 'post');

            try {

                DB::beginTransaction();

                $library = Library::create([
                    'library_type_id' => 1,
                    'folder' => 'users',
                    'local' => 'profile.png',
                    'remote' => env('UPLOADS_PATH') .'images/users/profile.png',
                ]);

                $user = User::create(array_merge(
                    $request->only('civility_id', 'country_id', 'phone_number', 'email', 'address', 'city', 'last_name', 'first_name'),
                    [
                        'user_type_id' => 2,
                        'library_id' => $library->id,
                    ]
                ));

                $human = Human::create(
                    array_merge(
                    $request->only('work_id', 'role_id', 'signature', 'username'),
                    [
                        'user_id' => $user->id,
                        #'username' => Helper::randomAlphaNumeric(false),
                        'password' => bcrypt(Helper::randomAlphaNumeric(true)),
                    ]
                ));

                $staff = Staff::create([
                    'staff_type_id' => $request->staff_type_id,
                    'human_id' => $human->id,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

                return redirect()->route('staff.show', ['staff' => $staff]);
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
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $civilities = Civility::all()->pluck(null, 'id');
        $staffTypes = StaffType::all()->pluck(null, 'id');
        $works = Work::all()->pluck(null, 'id');
        $roles = Role::all()->pluck(null, 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('staffs.edit', compact('staff', 'civilities', 'staffTypes', 'works', 'roles', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        if ($request->isMethod('put')) {

            $this->_validateRequest($request, 'put');

            try {

                DB::beginTransaction();

                $staff->human->user->update($request->except('work_id', 'staff_type_id', 'signature'));

                $staff->human->update($request->only('work_id', 'role_id', 'signature'));

                $staff->update($request->only('staff_type_id'));

                DB::commit();
            } catch (\Throwable $th) {

                DB::rollBack();

                dd($th);

                session()->flash('error', "Une erreur s'est produite");

                return back();
            }

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
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
            'role_id' => ['required'],
            'civility_id' => ['required'],
            'work_id' => ['required'],
            'staff_type_id' => ['required'],
            'last_name' => ['required', 'max:25'],
            'first_name' => ['required', 'max:25'],
            'phone_number' => ['max:20'],
            'email' => ['email', 'max:60'],
            'address' => ['max:50'],
            'city' => ['max:30'],
        ];

        if(mb_strtolower($method) == 'post'){
            $formData += [
                'username' => ['unique:humans', 'max:25'],
                'signature' => ['unique:humans', 'max:5'],
            ];
        }

        $request->validate($formData);
    }
}

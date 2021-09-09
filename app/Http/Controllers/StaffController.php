<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Human;
use App\Models\Staff;
use App\Helpers\Helper;
use App\Models\Library;
use App\Models\Civility;
use App\Models\StaffType;
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

        return view('staffs.create', compact('civilities', 'staffTypes'));
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

            try {

                DB::beginTransaction();

                $library = Library::create([
                    'library_type_id' => 1,
                    'folder' => 'users',
                    'local' => 'profile.png',
                    'remote' => env('UPLOADS_PATH') .'images/users/profile.png',
                ]);

                $user = User::create([
                    'user_type_id' => 2,
                    'civility_id' => $request->civility_id,
                    'library_id' => $library->id,
                    'last_name' => $request->last_name,
                    'first_name' => $request->first_name,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                ]);

                $human = Human::create([
                    'user_id' => $user->id,
                    'signature' => $request->signature,
                    'username' => Helper::randomAlphaNumeric(false),
                    'password' => Helper::randomAlphaNumeric(true),
                ]);

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

        return view('staffs.edit', compact('staff', 'civilities', 'staffTypes'));
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

            $this->_validateRequest($request);

            try {

                DB::beginTransaction();

                $staff->human->user->update($request->except('staff_type_id', 'signature'));

                $staff->human->update($request->only('signature'));

                $staff->update($request->only('staff_type_id'));

                DB::commit();
            } catch (\Throwable $th) {

                DB::rollBack();

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
    private function _validateRequest($request)
    {
        $request->validate([
            'civility_id' => ['required'],
            'staff_type_id' => ['required'],
            'last_name' => ['required', 'max:25'],
            'first_name' => ['required', 'max:25'],
            'phone_number' => ['max:20'],
            'email' => ['email', 'max:60'],
        ]);

        if($request->isMethod('post')){

            $request->validate([
                'signature' => ['unique:humans', 'max:5'],
            ]);
        }
    }
}

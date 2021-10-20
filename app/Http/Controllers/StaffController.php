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
use App\Models\ContractType;
use App\Models\StudyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $contractTypes = ContractType::all()->pluck(null, 'id');
        $studyLevels = StudyLevel::all()->pluck(null, 'id');

        return view('staffs.create', compact('civilities', 'staffTypes', 'works', 'roles', 'countries', 'contractTypes', 'studyLevels'));
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
                    'local' => 'man.png',
                    'remote' => env('UPLOADS_PATH') .'images/users/man.png',
                ]);

                $user = User::create(array_merge(
                    $request->only('civility_id', 'country_id', 'phone_number', 'email', 'address', 'city', 'last_name', 'first_name'),
                    [
                        'user_type_id' => 2,
                        'library_id' => $library->id,
                    ]
                ));

                $code = Human::count()
                    ? Human::count() + 1
                    : 1;
                $code = ($code < 10) ? '0000' . $code : '000' .$code;

                $human = Human::create(
                    array_merge(
                    $request->only('work_id', 'role_id', 'signature', 'username', 'contract_type_id', 'study_level_id', 'serial_number', 'date_of_birth', 'place_of_birth', 'hiring_date', 'contract_end_date'),
                    [
                        'serial_number' => $code,
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
        $contractTypes = ContractType::all()->pluck(null, 'id');
        $studyLevels = StudyLevel::all()->pluck(null, 'id');

        return view('staffs.edit', compact('staff', 'civilities', 'staffTypes', 'works', 'roles', 'countries', 'contractTypes', 'studyLevels'));
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

                $staff->human->update($request->only('work_id', 'role_id', 'signature', 'contract_type_id', 'study_level_id', 'date_of_birth', 'place_of_birth', 'hiring_date', 'contract_end_date'));

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
            'contract_type_id' => ['required'],
            'study_level_id' => ['required'],
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

    public function printingAll(Request $request)
    {
        $staffs = Staff::all();

        $pdf = PDF::loadView('staffs.printing.staffs', compact('staffs'));
        //$pdf->setOptions(array('isRemoteEnabled' => true));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/staffs.pdf"));

        return $pdf->stream('staffs.pdf');
    }

    public function printingOne(Request $request, Staff $staff)
    {
        $pdf = PDF::loadView('staffs.printing.staff', compact('staff'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/staff_{$staff->id}.pdf"));

        return $pdf->stream('staff.pdf');
    }

    public function qrcode(Request $request, Staff $staff)
    {
        \WerneckbhQRCode::text('QR Code Generator for Laravel!')
        ->setOutfile(public_path('qrcodes/qrcode1.png'))
        ->png();
        
        //QrCode::format('png')->generate('Make me into a QrCode!', public_path('qrcodes/qrcode.png'));

        //array(0,0,567.00,283.80) a0...a10
        $pdf = PDF::loadView('staffs.printing.qrcode', compact('staff'));
        $pdf->setPaper('a7', 'landscape');
        $pdf->save(public_path("libraries/docs/staff_qrcode_{$staff->id}.pdf"));

        return $pdf->stream('staff_qrcode.pdf');
    }
}

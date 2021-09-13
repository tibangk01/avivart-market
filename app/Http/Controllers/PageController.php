<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Human;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * index
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        //dd(bcrypt(123456789));
        
        return view('pages.index');
    }

    /**
     * developer
     *
     * @param Request $request
     * @return void
     */
    public function developer(Request $request)
    {
        return view('pages.developer');
    }


    /**
     * login
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {

        if ($request->isMethod('POST')) {

            $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);

            $human = Human::whereUsername($request->username)->first();

            if ($human) {

                if (Hash::check($request->password, $human->password)) {

                    auth()->login($human->user, $request->has('remember_me'));

                    $message = "Bienvenue {$human->user->full_name}";

                    switch (intval($human->user->user_type_id)) {
                        case 1: //developer
                            $redirectRoute = 'page.developer';
                            break;
                        default:    //staff
                            $redirectRoute = 'page.index';

                            $staff = Staff::where('human_id', $human->id)->firstOrFail();
                            session()->put('staff', $staff); // Bug to fix
                            break;
                    }

                    return redirect()->route($redirectRoute)->withSuccess($message);
                }
                return back()->withWarning('Mot de passe incorrect.');
            }

            return back()->withDanger('Erreur de connexion.');
        }

        return view('pages.login');
    }

    /**
     * forgot_password
     *
     * @param Request $request
     * @return void
     */
    public function forgot_password(Request $request)
    {
        if ($request->isMethod('post')) {
            dd($request->all());
        }
        return view('pages.forgot-password');
    }

    /**
     * verify_mail
     *
     * @param Request $request
     * @return void
     */
    public function verify_mail(Request $request)
    {
        return view('pages.verify-mail');
    }

    /**
     * reset_password
     *
     * @param Request $request
     * @return void
     */
    public function reset_password(Request $request)
    {
        return view('pages.reset-password');
    }

    /**
     * logout
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        session()->forget('human');
        auth()->logout();
        return redirect()->route('page.login');
    }
}

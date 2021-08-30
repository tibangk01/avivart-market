<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class PageController extends Controller
{
    /**
     * index
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('pages.dashboard.index');
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

            $this->validate($request, [
                'username' => ['required'],
                'password' => ['required'],
            ]);

            $human = Human::whereUsername($request->username)->first();

            if ($human) {

                if (Hash::check($request->password, $human->password)) {

                    auth()->login($human->user);

                    $message = 'Bienvenue '. ucfirst($human->user->full_name).' ! &#128079;';

                    switch (intval($user->user_type_id)) {
                        case 1: //developer
                            $redirectRoute = 'page.developer';
                            break;
                        
                        default:    //statf
                            $redirectRoute = 'page.index';
                            break;
                    }

                    return redirect()->route($redirectRoute)->withToastSuccess($message);
                }
                return back()->withWarning('Mot de passe incorrect.');
            }

            return back()->withDanger('Erreur de connexion.');
        }
        return view('pages.auth.login');
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
        return view('pages.auth.forgot-password');
    }

    /**
     * verify_mail
     *
     * @param Request $request
     * @return void
     */
    public function verify_mail(Request $request)
    {
        return view('pages.auth.verify-mail');
    }

    /**
     * reset_password
     *
     * @param Request $request
     * @return void
     */
    public function reset_password(Request $request)
    {
        return view('pages.auth.reset-password');
    }

    /**
     * logout
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('page.login');
    }
}

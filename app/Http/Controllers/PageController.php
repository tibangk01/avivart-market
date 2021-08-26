<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        //return view('pages.index');
        echo 'page.index';
        die;
    }

    /**
     * main
     *
     * @param Request $request
     * @return void
     */
    public function main(Request $request)
    {
        return view('pages.main');
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

                    session()->flash('success', 'Bienvenue');

                    return redirect()->route('page.main');
                }
                return back()->withWarning('Mot de passe incorrect.');
            }

            return back()->withDanger('Erreur de connexion.');
        }
        return view('pages.login');
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

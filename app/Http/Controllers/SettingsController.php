<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('sidebar_collapse_value')) {
            if (session('sidebarCollapseValue') == null) {
                session()->put('sidebarCollapseValue', 'sidebar-collapse');
            } else {
                session()->put('sidebarCollapseValue', '');
            }

            return response()->json(['sidebarCollapseValue' => session('sidebarCollapseValue')]);
        }

        if ($request->has('navbar_theme')) {
            session()->put('navbarTheme', $request->query('navbar_theme'));

            return back()->withInfo('Thème appliqué');
        }

        if ($request->has('sidebar_left_theme')) {
            session()->put('sidebarLeftTheme', $request->query('sidebar_left_theme'));

            return back()->withInfo('Thème appliqué');
        }

        return view('settings.index');
    }
}

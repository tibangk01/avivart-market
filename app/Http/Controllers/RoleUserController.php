<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleUsers = RoleUser::all();

        return view('roles_users.index', compact('roleUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck(null, 'id');
        $users = User::where('user_type_id', 2)->get()->pluck(null, 'id');

        return view('roles_users.create', compact('roles', 'users'));
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
            $request->validate([
                'role_id' => ['required'],
                'user_id' => ['required'],
            ]);

            $roleUser = RoleUser::create($request->all());

            session()->flash('success', "Donnée enregistrée");
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function show(RoleUser $roleUser)
    {
        return view('roles_users.show', compact('roleUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleUser $roleUser)
    {
        $roles = Role::all()->pluck(null, 'id');
        $users = User::where('user_type_id', 2)->get()->pluck(null, 'id');

        return view('roles_users.edit', compact('roleUser', 'roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleUser $roleUser)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'role_id' => ['required'],
                'user_id' => ['required'],
            ]);

            $roleUser->update($request->all());

            session()->flash('success', "Donnée enregistrée");
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleUser $roleUser)
    {
        $roleUser->delete();

        return back()->withDanger('Donnée supprimée');
    }
}

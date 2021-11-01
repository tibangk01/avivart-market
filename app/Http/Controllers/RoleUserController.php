<?php

namespace App\Http\Controllers;

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
        return view('roles_users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles_users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('roles_users.edit', compact('roleUser'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleUser $roleUser)
    {
        //
    }
}

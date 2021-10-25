<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Human;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $human = Human::with('user', 'work')->where('user_id', $user->id)->firstOrFail();

        $staff = Staff::with('human', 'staff_type')->where('human_id', $human->id)->firstOrFail();

        return view('users.show', compact('staff'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $human = Human::with('user', 'work')->where('user_id', $user->id)->firstOrFail();

        $staff = Staff::with('human', 'staff_type')->where('human_id', $human->id)->firstOrFail();

        return view('users.edit', compact('staff'));
    }
}

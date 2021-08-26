<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $agencies = Agency::all();
        return view('pages.agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $this->validate($request, [
                'name' => ['required', 'min:5'],
                'phone_number' => ['required', 'min:5'],
                'address' => ['required', 'min:3'],
            ]);

            $storeData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'phone' => 'required|numeric',
            ]);
            $employee = Employee::create($storeData);

            return redirect('/employees')->with('completed', 'Employee created!');

           // $society->update($request->only('tppcr', 'fiscal_code'));
           // $society->enterprise->update($request->only('name', 'phone_number', 'address', 'website'));

            session()->flash('success', 'OK'); //TODO: message update society ok.
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        return view('pages.agencies.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        return view('pages.agencies.index', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {

        if($request->isMethod('PUT'))
        {
            $this->validate($request, [
                'name' => ['required', 'min:3'],
                'phone_number' => ['required', 'min:3'],
                'address' => ['required', 'min:3'],

                'tppcr' => ['required', 'min:3'],
                'fiscal_code' => ['required', 'min:3'],
            ]);

           // $society->update($request->only('tppcr', 'fiscal_code'));
           // $society->enterprise->update($request->only('name', 'phone_number', 'address', 'website'));

            session()->flash('success', 'OK'); //TODO: message update society ok.
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        //
    }
}

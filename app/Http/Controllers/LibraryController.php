<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        return view('pages.dashboard.libraries.edit', compact('library'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {

        if ($request->isMethod('PUT')) {

            if ($request->has('form')) {

                switch ($request->input('form')) {

                    case 'local':

                        $this->validate($request, [
                            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:10000'],
                            'description' => ['required', 'min:10']
                        ]);

                        if ($request->hasFile('image') && $request->file('image')->isValid()) {

                            $fileName = time() . '.' . $request->file('image')->extension();
                            $storePath = $request->file('image')->storeAs(mb_strtolower($library->library_type->name) . '/' . $library->folder, $fileName,  ['disk' => 'public_dir']);

                            $library->update([
                                'description' => $request->description,
                                'local' => $fileName,
                                'remote' => env('UPLOADS_PATH') . $storePath,
                            ]);

                            session()->flash('success', 'mis à jour réussi');
                        }
                        break;
                    default: // remote

                        $this->validate($request, [
                            'remote' => ['required', 'url'],
                            'description' => ['required', 'min:10']
                        ]);

                        $library->update($request->all());

                        session()->flash('success', 'mis à jour réussi');

                        break;
                }
            }
        }
        return back();
    }
}

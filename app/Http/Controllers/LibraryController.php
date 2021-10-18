<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\PurchaseDeliveryNote;
use App\Models\OrderDeliveryNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create(Request $request)
    {
        $firstKey = array_key_first($request->query());

        session()->put($firstKey, $request->query($firstKey));

        return view('libraries.create');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('form')) {

                switch ($request->input('form')) {

                    case 'local':

                        $request->validate([
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

                            if(session()->has('purchase')) {

                                $purchase = Purchase::findOrFail(session('purchase'));
    
                                try {
                                    DB::beginTransaction();
    
                                    $library = Library::create([
                                        'library_type_id' => 1,
                                        'folder' => 'purchase_delivery_notes',
                                        'description' => $request->description,
                                        'local' => $fileName,
                                        'remote' => env('UPLOADS_PATH') . $storePath,
                                    ]);
    
                                    $purchaseDeliveryNote = PurchaseDeliveryNote::create([
                                        'purchase_id' => $purchase->id,
                                        'library_id' => $library->id,
                                    ]);
    
                                    DB::commit();
    
                                    session()->forget('purchase');
    
                                    session()->flash('success', 'Donnée enregistrée.');
    
                                    return redirect()->route('library.show', $library);
                                } catch (\Exception $ex) {
                                    DB::rollback();
    
                                    dd($ex);
    
                                    session()->flash('error', "Une erreur s'est produite");
                                }
    
                            } elseif (session()->has('order')) {
    
                                $order = Order::findOrFail(session('order'));
    
                                try {
                                    DB::beginTransaction();
    
                                    $library = Library::create([
                                        'library_type_id' => 1,
                                        'folder' => 'order_delivery_notes',
                                        'description' => $request->description,
                                        'local' => $fileName,
                                        'remote' => env('UPLOADS_PATH') . $storePath,
                                    ]);
    
                                    $orderDeliveryNote = OrderDeliveryNote::create([
                                        'order_id' => $order->id,
                                        'library_id' => $library->id,
                                    ]);
    
                                    DB::commit();
    
                                    session()->forget('order');
    
                                    session()->flash('success', 'Donnée enregistrée.');
    
                                    return redirect()->route('library.show', $library);
                                } catch (\Exception $ex) {
                                    DB::rollback();
    
                                    dd($ex);
    
                                    session()->flash('error', "Une erreur s'est produite");
                                }
                            }
                        }
                        break;
                    default: // remote

                        $request->validate([
                            'remote' => ['required', 'url'],
                            'description' => ['required', 'min:10']
                        ]);

                        if(session()->has('purchase')) {

                            $purchase = Purchase::findOrFail(session('purchase'));

                            try {
                                DB::beginTransaction();

                                $library = Library::create([
                                    'library_type_id' => 1,
                                    'folder' => 'purchase_delivery_notes',
                                    'description' => $request->description,
                                    'local' => $request->remote,
                                    'remote' => $request->remote,
                                ]);

                                $purchaseDeliveryNote = PurchaseDeliveryNote::create([
                                    'purchase_id' => $purchase->id,
                                    'library_id' => $library->id,
                                ]);

                                DB::commit();

                                session()->forget('purchase');

                                session()->flash('success', 'Donnée enregistrée.');

                                return redirect()->route('library.show', $library);
                            } catch (\Exception $ex) {
                                DB::rollback();

                                dd($ex);

                                session()->flash('error', "Une erreur s'est produite");
                            }

                        } elseif (session()->has('order')) {

                            $order = Order::findOrFail(session('order'));

                            try {
                                DB::beginTransaction();

                                $library = Library::create([
                                    'library_type_id' => 1,
                                    'folder' => 'order_delivery_notes',
                                    'description' => $request->description,
                                    'local' => $request->remote,
                                    'remote' => $request->remote,
                                ]);

                                $orderDeliveryNote = OrderDeliveryNote::create([
                                    'order_id' => $order->id,
                                    'library_id' => $library->id,
                                ]);

                                DB::commit();

                                session()->forget('order');

                                session()->flash('success', 'Donnée enregistrée.');

                                return redirect()->route('library.show', $library);
                            } catch (\Exception $ex) {
                                DB::rollback();

                                dd($ex);

                                session()->flash('error', "Une erreur s'est produite");
                            }
                        }

                        break;
                }
            }
        }

        return back();
    }

    /**
     * 
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        return view('libraries.show', compact('library'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        return view('libraries.edit', compact('library'));
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

                        $request->validate([
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

                        $request->validate([
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

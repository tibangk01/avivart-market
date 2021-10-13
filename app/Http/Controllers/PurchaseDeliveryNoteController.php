<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\Purchase;
use App\Models\ProductPurchase;
use App\Models\PurchaseDeliveryNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseDeliveryNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaseDeliveryNotes = PurchaseDeliveryNote::all();

        return view('purchase_delivery_notes.index', compact('purchaseDeliveryNotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchases = Purchase::with('products')->get();

        return view('purchase_delivery_notes.create', compact('purchases'));
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

            $productPurchase = ProductPurchase::findOrFail($request->input('product_purchase_id'));

            try {
                DB::beginTransaction();

                $productPurchase->update([
                    'comment' => $request->input('comment'),
                ]);

                $library = Library::create([
                    'library_type_id' => 1,
                    'folder' => 'purchase_delivery_notes',
                    'local' => 'delivery_note.png',
                    'remote' => env('UPLOADS_PATH') .'images/purchase_delivery_notes/delivery_note.png',
                ]);

                $purchaseDeliveryNote = PurchaseDeliveryNote::create([
                    'purchase_id' => $productPurchase->purchase_id,
                    'library_id' => $library->id,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');
            } catch (\Exception $ex) {
                DB::rollback();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  PurchaseDeliveryNote  $purchaseDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseDeliveryNote $purchaseDeliveryNote)
    {
        return view('purchase_delivery_notes.show', compact('purchaseDeliveryNote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PurchaseDeliveryNote  $purchaseDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseDeliveryNote $purchaseDeliveryNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PurchaseDeliveryNote  $purchaseDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseDeliveryNote $purchaseDeliveryNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PurchaseDeliveryNote  $purchaseDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseDeliveryNote $purchaseDeliveryNote)
    {
        //
    }
}

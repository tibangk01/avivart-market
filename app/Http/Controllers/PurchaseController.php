<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use BarryvdhDomPDF as PDF;
use Illuminate\Http\Request;
use \Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Society;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();

        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchases.create');
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
            $cartContent = Cart::instance($request->input('instance'))->content();

            try {
                DB::beginTransaction();

                $purchase = Purchase::create([
                    'provider_id' => $request->input('provider_id'),
                    'vat_id' => $request->input('vat_id'),
                    'discount_id' => $request->input('discount_id'),
                ]);

                foreach ($cartContent as $row) {
                    $purchase->products()->attach($purchase->id, [
                        'product_id' => $row->id,
                        'ordered_quantity' => $row->qty,
                    ]);
                }  

                DB::commit();

                Cart::instance($request->input('instance'))->destroy();

                session()->flash('success', 'Donnée enregistrée.');

                $this->updateStaffStatusBarInfo(
                    (float) $purchase->totalTTC(),
                    '-'
                );

                return redirect()->to(route('purchase.pdf', ['purchase' => $purchase]));    //to or away
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
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function printingAll(Request $request)
    {
        $purchases = Purchase::all();

        $pdf = PDF::loadView('purchases.printing.purchases', compact('purchases'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/purchases.pdf"));

        return $pdf->stream('purchases.pdf');
    }

    public function printingOne(Request $request, Purchase $purchase)
    {
        $pdf = PDF::loadView('purchases.printing.purchase', compact('purchase'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/purchase_{$purchase->id}.pdf"));

        return $pdf->stream('purchase.pdf');
    }
}

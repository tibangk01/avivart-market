<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use BarryvdhDomPDF as PDF;
use Illuminate\Http\Request;
use \Cart;
use App\Models\Provider;
use App\Models\Vat;
use App\Models\Discount;
use Illuminate\Support\Facades\DB;
use App\Models\Society;
use App\Models\Product;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;

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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

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
            
            $this->_validateRequest($request);

            $cartContent = Cart::instance($request->input('instance'))->content();

            $exercise = session('staffStatusBarInfo')->day_transaction->exercise;

            try {
                DB::beginTransaction();

                $purchase = Purchase::create([
                    'provider_id' => $request->provider_id,
                    'vat_id' => $request->vat_id,
                    'discount_id' => $request->discount_id,
                ]);

                foreach ($cartContent as $row) {
                    $product = Product::findOrFail($row->id);

                    $purchase->products()->attach($purchase->id, [
                        'product_id' => $product->id,
                        'ordered_quantity' => $row->qty,
                        'global_purchase_price' => $product->global_purchase_price,
                        'purchase_price' => $product->purchase_price,
                    ]);

                    $this->saveInventory($exercise, $product);
                }  

                DB::commit();

                Cart::instance($request->input('instance'))->destroy();

                session()->flash('success', 'Donnée enregistrée.');

                return redirect()->to(route('purchase.printing.one', ['purchase' => $purchase]));    //to or away
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
        $providers = Provider::all()->pluck(null, 'id');

        $vats = Vat::all()->pluck(null, 'id');

        $discounts = Discount::all()->pluck(null, 'id');

        return view('purchases.edit', compact('purchase', 'providers', 'vats', 'discounts'));
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
        if ($request->isMethod('PUT')) {
            
            $this->_validateRequest($request);

            $purchase->update($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //$purchase->delete();

        return back()->withDanger('Donnée supprimée');
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param mixed $request
     * @return void
     */
    private function _validateRequest($request)
    {
        $request->validate([
            'provider_id' => ['required'],
            'vat_id' => ['nullable'],
            'discount_id' => ['nullable'],
        ]);
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

        return $pdf->stream("purchase_{$purchase->id}.pdf");
    }
}

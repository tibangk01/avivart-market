<?php

namespace App\Http\Controllers;

use App\Models\Proforma;
use BarryvdhDomPDF as PDF;
use Illuminate\Http\Request;
use \Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Vat;
use App\Models\Discount;
use App\Models\Product;

class ProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proformas = Proforma::all();

        return view('proformas.index', compact('proformas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proformas.create');
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

            try {
                DB::beginTransaction();

                $proforma = Proforma::create([
                    'customer_id' => $request->customer_id,
                    'vat_id' => $request->vat_id,
                    'discount_id' => $request->discount_id,
                ]);

                foreach ($cartContent as $row) {
                    $product = Product::findOrFail($row->id);

                    $proforma->products()->attach($proforma->id, [
                        'product_id' => $product->id,
                        'quantity' => $row->qty,
                        'global_selling_price' => $product->global_selling_price,
                        'selling_price' => $product->selling_price,
                        'global_rental_price' => $product->global_rental_price,
                        'rental_price' => $product->rental_price,
                    ]);
                }  

                DB::commit();

                Cart::instance($request->input('instance'))->destroy();

                session()->flash('success', 'Donnée enregistrée.');

                return redirect()->to(route('proforma.printing.one', ['proforma' => $proforma]));    //to or away
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
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function show(Proforma $proforma)
    {
        return view('proformas.show', compact('proforma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function edit(Proforma $proforma)
    {
        $customers = Customer::all()->pluck(null, 'id');

        $vats = Vat::all()->pluck(null, 'id');

        $discounts = Discount::all()->pluck(null, 'id');

        return view('proformas.edit', compact('proforma', 'customers', 'vats', 'discounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proforma $proforma)
    {
        if ($request->isMethod('PUT')) {

            $this->_validateRequest($request);

            $proforma->update($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proforma $proforma)
    {
        //
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
            'customer_id' => ['required'],
            'vat_id' => ['nullable'],
            'discount_id' => ['nullable'],
        ]);
    }

    public function printingAll(Request $request)
    {
        $proformas = Proforma::all();

        $pdf = PDF::loadView('proformas.printing.proformas', compact('proformas'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/proformas.pdf"));

        return $pdf->stream('proformas.pdf');
    }

    public function printingOne(Request $request, Proforma $proforma)
    {
        $pdf = PDF::loadView('proformas.printing.proforma', compact('proforma'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/proforma_{$proforma->id}.pdf"));

        return $pdf->stream("proforma_{$proforma->id}.pdf");
    }
}

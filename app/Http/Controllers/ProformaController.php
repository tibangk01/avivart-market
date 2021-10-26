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
            $request->validate([
                'customer_id' => ['required'],
                'vat_id' => ['required'],
                'discount_id' => ['required'],
            ]);

            $cartContent = Cart::instance($request->input('instance'))->content();

            try {
                DB::beginTransaction();

                $proforma = Proforma::create([
                    'customer_id' => $request->input('customer_id'),
                    'vat_id' => $request->input('vat_id'),
                    'discount_id' => $request->input('discount_id'),
                ]);

                foreach ($cartContent as $row) {
                    $proforma->products()->attach($proforma->id, [
                        'product_id' => $row->id,
                        'quantity' => $row->qty,
                    ]);
                }  

                DB::commit();

                Cart::instance($request->input('instance'))->destroy();

                session()->flash('success', 'Donnée enregistrée.');

                return redirect()->to(route('proforma.pdf', ['proforma' => $proforma]));    //to or away
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
            $request->validate([
                'customer_id' => ['required'],
                'vat_id' => ['required'],
                'discount_id' => ['required'],
            ]);

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

        return $pdf->stream('proforma.pdf');
    }
}

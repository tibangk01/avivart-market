<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vat;
use App\Models\Discount;
use App\Models\QuickSale;
use Illuminate\Http\Request;
use BarryvdhDomPDF as PDF;

class QuickSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quickSales = QuickSale::all();

        return view('quick_sales.index', compact('quickSales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck(null, 'id');
        $vats = Vat::all()->pluck(null, 'id');
        $discounts = Discount::all()->pluck(null, 'id');

        return view('quick_sales.create', compact('products', 'vats', 'discounts'));
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

            $product = Product::findOrFail($request->product_id);

            $quickSale = quickSale::create(array_merge(
                $request->all(),
                [
                    'selling_price' => $product->selling_price,
                ]
            ));

            $this->updateStaffStatusBarInfo(
                $quickSale->totalTTC(),
                '+'
            );

            session()->flash('success', "Donnée enregistrée");

            return redirect()->to(route('quick_sale.printing.receipt', ['quick_sale' => $quickSale]));    //to or away
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuickSale  $quickSale
     * @return \Illuminate\Http\Response
     */
    public function show(QuickSale $quickSale)
    {
        return view('quick_sales.show', compact('quickSale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuickSale  $quickSale
     * @return \Illuminate\Http\Response
     */
    public function edit(QuickSale $quickSale)
    {
        $products = Product::all()->pluck(null, 'id');
        $vats = Vat::all()->pluck(null, 'id');
        $discounts = Discount::all()->pluck(null, 'id');

        return view('quick_sales.edit', compact('quickSale', 'products', 'vats', 'discounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuickSale  $quickSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuickSale $quickSale)
    {
        if ($request->isMethod('PUT')) {

            $this->_validateRequest($request);

            $quickSale->update($request->all());

            session()->flash('success', "Donnée enregistrée");
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuickSale  $quickSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuickSale $quickSale)
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
            'product_id' => ['required'],
            'vat_id' => ['required'],
            'discount_id' => ['required'],
            'quantity' => ['required'],
        ]);
    }

    public function printingAll(Request $request)
    {
        $quickSales = QuickSale::all();

        $pdf = PDF::loadView('quick_sales.printing.quick_sales', compact('quickSales'));
        //$pdf->setOptions(array('isRemoteEnabled' => true));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/quick_sales.pdf"));

        return $pdf->stream('quick_sales.pdf');
    }

    public function printingOne(Request $request, QuickSale $quickSale)
    {
        $pdf = PDF::loadView('quick_sales.printing.quick_sale', compact('quickSale'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/quick_sale_{$quickSale->id}.pdf"));

        return $pdf->stream('quick_sale.pdf');
    }

    public function receipt(Request $request, QuickSale $quickSale)
    {
        $pdf = PDF::loadView('quick_sales.printing.receipt', compact('quickSale'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/receipt_{$quickSale->id}.pdf"));

        return $pdf->stream('receipt.pdf');
    }
}

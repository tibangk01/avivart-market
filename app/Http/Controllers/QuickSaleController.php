<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vat;
use App\Models\Discount;
use App\Models\QuickSale;
use App\Models\ExerciseProduct;
use Illuminate\Http\Request;
use BarryvdhDomPDF as PDF;
use Illuminate\Support\Facades\DB;

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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

        $products = Product::where('stock_quantity', '>', 0)->get()->pluck(null, 'id');
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

            $exercise = session('staffStatusBarInfo')->day_transaction->exercise;

            if (($product->stock_quantity - intval($request->quantity)) < 0) {
                return back()->withWarning('Stock insuffisant');
            }

            try {

                DB::beginTransaction();

                $quickSale = quickSale::create(array_merge(
                    $request->all(),
                    [
                        'selling_price' => $product->selling_price,
                    ]
                ));

                $product->update([
                    'stock_quantity' => $product->stock_quantity - $quickSale->quantity,
                ]);

                $this->saveInventory($exercise, $product);

                DB::commit();

                $this->updateStaffStatusBarInfo(
                    $quickSale->totalTTC(),
                    '+'
                );

                session()->flash('success', "Donnée enregistrée");

                return redirect()->to(route('quick_sale.printing.receipt', ['quick_sale' => $quickSale]));    //to or away

            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

        $products = Product::where('stock_quantity', '>', 0)->get()->pluck(null, 'id');
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

            $product = Product::findOrFail($quickSale->product_id);

            if (($product->stock_quantity - intval($request->quantity)) < 0) {
                return back()->withWarning('Stock insuffisant');
            }

            try {

                DB::beginTransaction();

                $product->update([
                    'stock_quantity' => $product->stock_quantity + $quickSale->quantity,
                ]);

                $this->updateStaffStatusBarInfo(
                    $quickSale->totalTTC(),
                    '-'
                );

                $quickSale->update($request->all());

                $product->update([
                    'stock_quantity' => $product->stock_quantity - $quickSale->quantity,
                ]);

                DB::commit();

                $this->updateStaffStatusBarInfo(
                    $quickSale->totalTTC(),
                    '+'
                );

                session()->flash('success', "Donnée enregistrée");

            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
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
            'vat_id' => ['nullable'],
            'discount_id' => ['nullable'],
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

        return $pdf->stream("quick_sale_{$quickSale->id}.pdf");
    }

    public function receipt(Request $request, QuickSale $quickSale)
    {
        $pdf = PDF::loadView('quick_sales.printing.receipt', compact('quickSale'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/receipt_{$quickSale->id}.pdf"));

        return $pdf->stream("receipt_{$quickSale->id}.pdf");
    }
}

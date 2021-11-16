<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Product;
use App\Models\Conversion;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::all()->pluck(null, 'id');
        $conversions = Conversion::all()->pluck(null, 'id');
        $product_types = ProductType::all()->pluck(null, 'id');
        $providers = Provider::all()->pluck(null, 'id');

        return view('products.create', compact('providers', 'product_categories', 'conversions', 'product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->_validateRequest($request);

            try {

                DB::beginTransaction();

                $library = Library::create([
                    'library_type_id' => 1,
                    'folder' => 'products',
                    'local' => 'default.jpg',
                    'remote' => env('UPLOADS_PATH') .'images/products/default.jpg',
                ]);

                $product = Product::create(array_merge(
                    $request->all(),
                    [
                        'library_id' => $library->id,
                    ]
                ));

                DB::commit();

                session()->flash('success', 'Donnée enregistré.');

                return redirect()->route('product.show', ['product' => $product]);
            } catch (\Throwable $th) {
                DB::rollBack();

                session()->flash('error', "Une erreur s'est produite");
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_categories = ProductCategory::all()->pluck(null, 'id');
        $conversions = Conversion::all()->pluck(null, 'id');
        $product_types = ProductType::all()->pluck(null, 'id');
        $providers = Provider::all()->pluck(null, 'id');

        return view('products.edit', compact('product', 'providers', 'product_categories', 'conversions', 'product_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            $product->update($request->all());

            session()->flash('success', 'Modification reussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //$product->delete();

        return back()->withDanger('Donnée supprimée');
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function _validateRequest($request)
    {
        $request->validate([
            'provider_id' => ['required'],
            'product_type_id' => ['required'],
            'product_category_id' => ['required'],
            'conversion_id' => ['required'],
            'name' => ['required', 'min:3', 'max:50'],
            'items' => ['required', 'numeric'],
            'stock_quantity' => ['required', 'numeric'],
            'alert_quantity' => ['required', 'numeric'],
            'global_purchase_price' => ['required'],
            'purchase_price' => ['required'],
            'global_selling_price' => ['required'],
            'selling_price' => ['required'],
            'global_rental_price' => ['required'],
            'rental_price' => ['required'],
            'serial_number' => ['nullable'],
            'manufacture_date' => ['nullable'],
            'expiration_date' => ['nullable'],
            'mark' => ['nullable'],
            'ref' => ['nullable'],
            'description' => ['nullable'],
            'characteristics' => ['nullable'],
        ]);
    }

    public function printingAll(Request $request)
    {
        $products = Product::all();

        $pdf = PDF::loadView('products.printing.products', compact('products'));
        //$pdf->setOptions(array('isRemoteEnabled' => true));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/products.pdf"));

        return $pdf->stream('products.pdf');
    }

    public function printingOne(Request $request, Product $product)
    {
        $pdf = PDF::loadView('products.printing.product', compact('product'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/product_{$product->id}.pdf"));

        return $pdf->stream('product.pdf');
    }
}

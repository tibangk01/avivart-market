<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Proforma;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Cart;

class CartController extends Controller
{
    public function __construct()
	{
		parent::__construct();
	}

    public function checkout(Request $request)
    {
        return back();
    }

    public function add(Request $request, Product $product)
    {
    	//
        $quantity = 1;

        if ($request->has('quantity') && ($request->query('quantity') > 0)) {
            $quantity = $request->query('quantity');
        }

        Cart::instance($request->query('instance'))->add($product, $quantity, array())->associate(Product::class);

        flashy()->success("Produit ajouté au panier");

        return back();
    }

    public function remove(Request $request, string $row)
    {
    	Cart::instance($request->query('instance'))->remove($row);

        flashy()->info("Produit supprimé du panier");

        return back();
    }

    public function update(Request $request, string $row)
    {
    	if ($request->has('quantity') && ($request->query('quantity') > 0)) {
            Cart::instance($request->query('instance'))->update($row, $request->query('quantity'));

            flashy()->info("Produit mise à jour dans le panier");
        }

        return back();
    }

    public function truncate(Request $request)
    {
    	Cart::instance($request->query('instance'))->destroy();

        flashy()->error("Panier vidé");

        return back();
    }

    public function loadProforma(Request $request)
    {
        if ($request->isMethod('POST')) {

            $proforma = Proforma::findOrFail($request->input('proforma_id'));

            Cart::instance('order')->destroy();

            foreach ($proforma->products as $product) {
                Cart::instance('order')->add($product, $product->pivot->quantity, array())->associate(Product::class);
            }

            session()->put('loadedProforma', $proforma);

            flashy()->success("Proforma charger");

        }

        return back();
    }
}

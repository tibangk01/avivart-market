<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $cartContent = Cart::instance($request->query('instance'))->content();

        try {
            DB::beginTransaction();

            switch ($request->query('instance')) {
                case 'purchase':
                    
                    $purchase = Purchase::create([
                        'provider_id' => $request->input('provider_id'),
                        'vat_id' => $request->input('vat_id'),
                        'discount_id' => $request->input('discount_id'),
                    ]);

                    foreach ($cartContent as $row) {
                        ProductPurchase::create([
                            'purchase_id' => $purchase->id,
                            'product_id' => $row->id,
                            'ordered_quantity' => $row->qty,
                        ]);
                    }

                    break;
                
                default:
                    // code...
                    break;
            }   

            DB::commit();

            Cart::instance($request->query('instance'))->destroy();
        } catch (\Exception $ex) {
            DB::rollback();
        }

        return back();
    }

    public function add(Request $request, Product $product)
    {
    	//
        $quantity = 1;

        if ($request->has('quantity') && ($request->query('quantity') > 0)) {
            $quantity = $request->query('quantity');
        }

        Cart::instance($request->query('instance'))->add($product, $quantity, array());

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
}

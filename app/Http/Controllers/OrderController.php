<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Proforma;
use BarryvdhDomPDF as PDF;
use Illuminate\Http\Request;
use \Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\OrderPayment;
use App\Models\Vat;
use App\Models\Discount;
use App\Models\OrderState;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
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
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

        $proformas = Proforma::all();

        return view('orders.create', compact('proformas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        if ($request->isMethod('POST')) {
            
            $cartContent = Cart::instance($request->input('instance'))->content();

            $exercise = session('staffStatusBarInfo')->day_transaction->exercise;

            $canSave = true;

            foreach ($cartContent as $row) {
                $product = Product::findOrFail($row->id);

                if (($product->stock_quantity - intval($row->qty)) < 0) {
                    $canSave = false;
                    break;
                }
            }

            if (!$canSave) {
                return back()->withWarning('Stock insuffisant');
            }

            try {
                DB::beginTransaction();

                $order = Order::create($request->validated());

                foreach ($cartContent as $row) {
                    $product = Product::findOrFail($row->id);

                    $order->products()->attach($order->id, [
                        'product_id' => $product->id,
                        'quantity' => $row->qty,
                        'global_selling_price' => $product->global_selling_price,
                        'selling_price' => $product->selling_price,
                        'global_rental_price' => $product->global_rental_price,
                        'rental_price' => $product->rental_price,
                    ]);

                    $product->update([
                        'stock_quantity' => $product->stock_quantity - $row->qty,
                    ]);

                    $this->saveInventory($exercise, $product);
                }  

                DB::commit();

                Cart::instance($request->input('instance'))->destroy();

                session()->flash('success', 'Donnée enregistrée.');

                return redirect()->to(route('order.printing.one', ['order' => $order]));    //to or away
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers = Customer::all()->pluck(null, 'id');

        $vats = Vat::all()->pluck(null, 'id');

        $discounts = Discount::all()->pluck(null, 'id');

        $orderStates = OrderState::all()->pluck(null, 'id');

        return view('orders.edit', compact('order', 'customers', 'vats', 'discounts', 'orderStates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        if ($request->isMethod('PUT')) {

            //Gate
            $this->authorize('cudProductOrder', $order);

            try {
                
                DB::beginTransaction();

                $order->update($request->validated());

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //Gate
        $this->authorize('cudProductOrder', $order);

        if ($orderPayment = OrderPayment::where('order_id', $order->id)->first()) {
            $orderPayment->payment->delete();
        }

        $order->delete();

        return back()->withDanger('Donnée supprimée');
    }

    public function printingAll(Request $request)
    {
        $orders = Order::all();

        $pdf = PDF::loadView('orders.printing.orders', compact('orders'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/orders.pdf"));

        return $pdf->stream('orders.pdf');
    }

    public function printingOne(Request $request, Order $order)
    {
        $pdf = PDF::loadView('orders.printing.order', compact('order'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/order_{$order->id}.pdf"));

        return $pdf->stream("order_{$order->id}.pdf");
    }
}

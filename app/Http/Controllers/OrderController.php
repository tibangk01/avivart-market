<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Proforma;
use BarryvdhDomPDF as PDF;
use Illuminate\Http\Request;
use \Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Vat;
use App\Models\Discount;
use App\Models\OrderState;
use App\Models\Product;

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
        $proformas = Proforma::all();

        return view('orders.create', compact('proformas'));
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

                $order = Order::create([
                    'customer_id' => $request->customer_id,
                    'vat_id' => $request->vat_id,
                    'discount_id' => $request->discount_id,
                    'order_state_id' => $request->order_state_id,
                ]);

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
    public function update(Request $request, Order $order)
    {
        if ($request->isMethod('PUT')) {

            $this->_validateRequest($request);

            $order->update($request->all());

            session()->flash('success', 'Donnée enregistrée.');
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
            'order_state_id' => ['required'],
        ]);
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

        return $pdf->stream('order.pdf');
    }
}

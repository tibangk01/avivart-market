<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Proforma;
use BarryvdhDomPDF as PDF;
use Illuminate\Http\Request;
use \Cart;
use Illuminate\Support\Facades\DB;

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
            $cartContent = Cart::instance($request->input('instance'))->content();

            try {
                DB::beginTransaction();

                $order = Order::create([
                    'customer_id' => $request->input('customer_id'),
                    'vat_id' => $request->input('vat_id'),
                    'discount_id' => $request->input('discount_id'),
                    'order_state_id' => $request->input('order_state_id'),
                ]);

                foreach ($cartContent as $row) {
                    $order->products()->attach($order->id, [
                        'product_id' => $row->id,
                        'quantity' => $row->qty,
                    ]);
                }  

                DB::commit();

                Cart::instance($request->input('instance'))->destroy();

                session()->flash('success', 'Donnée enregistrée.');

                $this->updateStaffStatusBarInfo(
                    (float) $order->totalTTC(),
                    '+'
                );

                return redirect()->to(route('order.pdf', ['order' => $order]));    //to or away
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
        //
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
        //
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

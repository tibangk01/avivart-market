<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;

class OrderPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderPayments = OrderPayment::all();
        
        return view('order_payments.index', compact('orderPayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order_payments.create');
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
                'order_id' => ['required'],
                'amount' => ['required'],
            ]);

            try {

                DB::beginTransaction();

                $order = Order::findOrFail($request->order_id);

                $payment = Payment::create($request->only('amount'));

                $orderPayment = OrderPayment::create([
                    'order_id' => $order->id,
                    'payment_id' => $payment->id,
                ]);

                $order->update([
                    'order_state_id' => $request->input('order_state_id'),
                    'paid' => true,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

                $this->updateStaffStatusBarInfo(
                    (float) $request->input('amount'),
                    '+'
                );

                return redirect()->to(route('order_payment.printing.one', ['order_payment' => $orderPayment]));    //to or away

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
     * @param  \App\Models\OrderPayment  $orderPayment
     * @return \Illuminate\Http\Response
     */
    public function show(OrderPayment $orderPayment)
    {
        return view('order_payments.show', compact('orderPayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderPayment  $orderPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderPayment $orderPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderPayment  $orderPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderPayment $orderPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderPayment  $orderPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderPayment $orderPayment)
    {
        //
    }

    public function printingAll(Request $request)
    {
        $orderPayments = OrderPayment::all();

        $pdf = PDF::loadView('order_payments.printing.order_payments', compact('orderPayments'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/order_payments.pdf"));

        return $pdf->stream('order_payments.pdf');
    }

    public function printingOne(Request $request, OrderPayment $orderPayment)
    {
        $pdf = PDF::loadView('order_payments.printing.order_payment', compact('orderPayment'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/order_payment_{$orderPayment->id}.pdf"));

        return $pdf->stream('order_payment.pdf');
    }
}
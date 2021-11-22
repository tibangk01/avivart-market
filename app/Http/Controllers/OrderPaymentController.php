<?php

namespace App\Http\Controllers;

use App\Models\OrderState;
use App\Models\PaymentMode;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderPayment;
use App\Models\ExerciseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;
use App\Http\Requests\StoreOrderPaymentRequest;
use App\Http\Requests\UpdateOrderPaymentRequest;

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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

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
                'payment_mode_id' => ['required'],
                'order_state_id' => ['required'],
                'order_id' => ['required'],
                'amount' => ['required'],
            ]);

            try {

                DB::beginTransaction();

                $order = Order::findOrFail($request->order_id);

                $totalPayment = 0;

                if ($orderPayments = OrderPayment::where('order_id', $order->id)->get()) {
                    foreach ($orderPayments as $orderPayment) {
                        $totalPayment += $orderPayment->payment->amount;
                    }
                }

                if ((floatval($request->amount) + $totalPayment) > $order->totalTTC()) {
                    return back()->withDanger('Erreur de payement');
                }

                $payment = Payment::create($request->except('order_id'));

                $orderPayment = OrderPayment::create([
                    'order_id' => $order->id,
                    'payment_id' => $payment->id,
                ]);

                $order->update([
                    'order_state_id' => $request->input('order_state_id'),
                    'paid' => ($request->state == 'on' || $request->state) ? true : false,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

                $this->updateStaffStatusBarInfo(
                    $payment->amount,
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
        $orderStates = OrderState::all()->pluck(null, 'id');

        $orders = Order::where('paid', true)->get()->pluck(null, 'id');

        $paymentModes = PaymentMode::all()->pluck(null, 'id');

        return view('order_payments.edit', compact('orderPayment', 'orderStates', 'orders', 'paymentModes'));
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
        if ($request->isMethod('PUT')) {
            $request->validate([
                'payment_mode_id' => ['required'],
                'order_state_id' => ['required'],
                'order_id' => ['required'],
                'amount' => ['required'],
            ]);
            
            $orderPayment->order->update($request->only('order_state_id'));

            $orderPayment->payment->update($request->only('payment_mode_id'));

            session()->flash('success', 'Donnée enregistrée.');
        }

        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderPayment  $orderPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderPayment $orderPayment)
    {
        $orderPayment->payment->delete();

        return back()->withDanger('Donnée supprimée');
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

        return $pdf->stream("order_payment_{$orderPayment->id}.pdf");
    }
}

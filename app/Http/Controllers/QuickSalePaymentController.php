<?php

namespace App\Http\Controllers;

use App\Models\OrderState;
use App\Models\PaymentMode;
use App\Models\QuickSale;
use App\Models\Payment;
use App\Models\QuickSalePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;
use App\Http\Requests\StoreQuickSalePaymentRequest;
use App\Http\Requests\UpdateQuickSalePaymentRequest;

class QuickSalePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quickSalePayments = QuickSalePayment::all();
        
        return view('quick_sale_payments.index', compact('quickSalePayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

        return view('quick_sale_payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuickSalePaymentRequest $request)
    {
        if ($request->isMethod('POST')) {

            try {

                DB::beginTransaction();

                $quickSale = QuickSale::findOrFail($request->quick_sale_id);

                $totalPayment = QuickSalePayment::totalPayment($quickSale);

                if ((floatval($request->amount) + $totalPayment) > $quickSale->totalTTC()) {
                    return back()->withDanger('Erreur de payement');
                }

                $payment = Payment::create(array_merge(
                    $request->except('quick_sale_id'),
                    [
                        'state' => ($request->state == 'on' || $request->state) ? true : false,
                    ]
                ));

                $quickSalePayment = QuickSalePayment::create([
                    'quick_sale_id' => $quickSale->id,
                    'payment_id' => $payment->id,
                ]);

                $quickSale->update([
                    'order_state_id' => $request->input('order_state_id'),
                    'paid' => (floatval($request->amount) + $totalPayment) == $quickSale->totalTTC(),
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

                $this->updateStaffStatusBarInfo(
                    $payment->amount,
                    '+'
                );

                return redirect()->to(route('quick_sale_payment.printing.one', ['quick_sale_payment' => $quickSalePayment]));    //to or away

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
     * @param  \App\Models\QuickSalePayment  $quickSalePayment
     * @return \Illuminate\Http\Response
     */
    public function show(QuickSalePayment $quickSalePayment)
    {
        return view('quick_sale_payments.show', compact('quickSalePayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuickSalePayment  $quickSalePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(QuickSalePayment $quickSalePayment)
    {
        $orderStates = OrderState::all()->pluck(null, 'id');

        $quickSales = QuickSale::where('paid', true)->get()->pluck(null, 'id');

        $paymentModes = PaymentMode::all()->pluck(null, 'id');

        return view('quick_sale_payments.edit', compact('quickSalePayment', 'orderStates', 'quickSales', 'paymentModes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuickSalePayment  $quickSalePayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuickSalePaymentRequest $request, QuickSalePayment $quickSalePayment)
    {
        if ($request->isMethod('PUT')) {

            try {

                DB::beginTransaction();
            
                $quickSalePayment->quick_sale->update($request->only('order_state_id'));

                $quickSalePayment->payment->update($request->only('payment_mode_id', 'cheque_number'));

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');
                
            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuickSalePayment  $quickSalePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuickSalePayment $quickSalePayment)
    {
        $quickSalePayment->payment->delete();

        return back()->withDanger('Donnée supprimée');
    }

    public function printingAll(Request $request)
    {
        $quickSalePayments = QuickSalePayment::all();

        $pdf = PDF::loadView('quick_sale_payments.printing.quick_sale_payments', compact('quickSalePayments'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/quick_sale_payments.pdf"));

        return $pdf->stream('quick_sale_payments.pdf');
    }

    public function printingOne(Request $request, QuickSalePayment $quickSalePayment)
    {
        $pdf = PDF::loadView('quick_sale_payments.printing.quick_sale_payment', compact('quickSalePayment'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/quick_sale_payment_{$quickSalePayment->id}.pdf"));

        return $pdf->stream("quick_sale_payment_{$quickSalePayment->id}.pdf");
    }
}

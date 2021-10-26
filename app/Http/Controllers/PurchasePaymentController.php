<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Payment;
use App\Models\PurchasePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BarryvdhDomPDF as PDF;

class PurchasePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchasePayments = PurchasePayment::all();

        return view('purchase_payments.index', compact('purchasePayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase_payments.create');
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
                'purchase_id' => ['required'],
                'amount' => ['required'],
            ]);

            try {

                DB::beginTransaction();

                $purchase = Purchase::findOrFail($request->purchase_id);

                $payment = Payment::create($request->except('purchase_id'));

                $purchasePayment = PurchasePayment::create([
                    'purchase_id' => $purchase->id,
                    'payment_id' => $payment->id,
                ]);

                $purchase->update([
                    'paid' => true,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

                $this->updateStaffStatusBarInfo(
                    (float) $request->input('amount'),
                    '-'
                );

                return redirect()->to(route('purchase_payment.printing.one', ['purchase_payment' => $purchasePayment]));    //to or away

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
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function show(PurchasePayment $purchasePayment)
    {
        return view('purchase_payments.show', compact('purchasePayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchasePayment $purchasePayment)
    {
        //
    }

    public function printingAll(Request $request)
    {
        $purchasePayments = PurchasePayment::all();

        $pdf = PDF::loadView('purchase_payments.printing.purchase_payments', compact('purchasePayments'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/purchase_payments.pdf"));

        return $pdf->stream('purchase_payments.pdf');
    }

    public function printingOne(Request $request, PurchasePayment $purchasePayment)
    {
        $pdf = PDF::loadView('purchase_payments.printing.purchase_payment', compact('purchasePayment'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->save(public_path("libraries/docs/purchase_payments_{$purchasePayment->id}.pdf"));

        return $pdf->stream('purchase_payments.pdf');
    }
}

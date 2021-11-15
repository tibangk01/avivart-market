@extends('layouts.dashboard', ['title' => "Payement fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">

                {!! Form::model($purchasePayment, ['method' => 'PUT', 'route' => ['purchase_payment.update', $purchasePayment]]) !!}

                <div class="form-group">
                    {!! Form::label('purchase_id', "Commande fournisseur") !!}
                    {!! Form::select('purchase_id', $purchases, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez", 'readonly' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('amount', 'Montant') !!}
                    {!! Form::number('amount', $purchasePayment->payment->amount, ['class' => 'form-control', 'required' => true, 'step' => 'any', 'readonly' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('payment_mode_id', "Mode de règlement") !!}
                    {!! Form::select('payment_mode_id', $paymentModes, $purchasePayment->payment->payment_mode_id, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group text-right">
                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-warning']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>
@endsection
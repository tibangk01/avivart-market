@extends('layouts.dashboard', ['title' => "Payement fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

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

                <div class="form-group">
                    {!! Form::label('cheque_number', 'N° de chèque') !!}
                    {!! Form::text('cheque_number', $purchasePayment->payment->cheque_number, ['class' => 'form-control', 'placeholder' => 'N° de chèque']) !!}
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
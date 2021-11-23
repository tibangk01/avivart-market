@extends('layouts.dashboard', ['title' => "Payement client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                
                {!! Form::model($orderPayment, ['method' => 'PUT', 'route' => ['order_payment.update', $orderPayment]]) !!}

                <div class="form-group">
                    {!! Form::label('order_id', "Commande client") !!}
                    {!! Form::select('order_id', $orders, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez", 'readonly' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('amount', 'Montant') !!}
                    {!! Form::number('amount', $orderPayment->payment->amount, ['class' => 'form-control', 'required' => true, 'step' => 'any', 'readonly' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('order_state_id', "Etat") !!}
                    {!! Form::select('order_state_id', $orderStates, $orderPayment->order->order_state_id, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('payment_mode_id', "Mode de règlement") !!}
                    {!! Form::select('payment_mode_id', $paymentModes, $orderPayment->payment->payment_mode_id, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cheque_number', 'N° de chèque') !!}
                    {!! Form::text('cheque_number', $orderPayment->payment->cheque_number, ['class' => 'form-control', 'placeholder' => 'N° de chèque']) !!}
                </div>

                <div class="form-group text-right">
                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.dashboard', ['title' => "Payement vente rapide"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
                {!! Form::model($quickSalePayment, ['method' => 'PUT', 'route' => ['quick_sale_payment.update', $quickSalePayment]]) !!}

                <div class="form-group">
                    {!! Form::label('quick_sale_id', "Vente rapide") !!}
                    {!! Form::select('quick_sale_id', $quickSales, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez", 'readonly' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('amount', 'Montant') !!}
                    {!! Form::number('amount', $quickSalePayment->payment->amount, ['class' => 'form-control', 'required' => true, 'step' => 'any', 'readonly' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('order_state_id', "Etat") !!}
                    {!! Form::select('order_state_id', $orderStates, $quickSalePayment->quick_sale->order_state_id, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('payment_mode_id', "Mode de règlement") !!}
                    {!! Form::select('payment_mode_id', $paymentModes, $quickSalePayment->payment->payment_mode_id, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cheque_number', 'N° de chèque') !!}
                    {!! Form::text('cheque_number', $quickSalePayment->payment->cheque_number, ['class' => 'form-control', 'placeholder' => 'N° de chèque']) !!}
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
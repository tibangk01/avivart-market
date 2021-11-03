 @extends('layouts.dashboard', ['title' => "Commande client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($order, ['method' => 'PUT', 'route' => ['order.update', $order]]) !!}

                <div class="form-group">
                    {!! Form::label('customer_id', 'Client') !!}
                    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez un client']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('vat_id', 'TVA') !!}
                    {!! Form::select('vat_id', $vats, null, ['class' => 'form-control', 'placeholder' => 'Choisissez une TVA']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('discount_id', 'Remise') !!}
                    {!! Form::select('discount_id', $discounts, null, ['class' => 'form-control', 'placeholder' => 'Choisissez une remise']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('order_state_id', 'Etat') !!}
                    {!! Form::select('order_state_id', $orderStates, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez un état']) !!}
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
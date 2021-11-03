@extends('layouts.dashboard', ['title' => 'Vente rapide'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    {!! Form::model($quickSale, ['method' => 'put', 'route' => ['quick_sale.update', $quickSale]]) !!}

                    <div class="form-group">
                    {!! Form::label('product_id', 'Produit') !!}
                        {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('quantity', 'Quantité') !!}
                        {!! Form::number('quantity', null, ['class' => 'form-control', 'required' => true, 'min' => 1, 'step' => 1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('vat_id', 'TVA') !!}
                        {!! Form::select('vat_id', $vats, null, ['class' => 'form-control', 'placeholder' => 'Choisissez']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('discount_id', 'Remise') !!}
                        {!! Form::select('discount_id', $discounts, null, ['class' => 'form-control', 'placeholder' => 'Choisissez']) !!}
                    </div>

                    <div class="form-group text-right">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

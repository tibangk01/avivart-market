@extends('layouts.dashboard', ['title' => 'Editer un produit'])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::model($product, ['method' => 'put', 'route' => ['product.update', $product]]) !!}

                <div class="form-group">
                    {!! Form::label('product_type_id', 'Type') !!}
                    {!! Form::select('product_type_id', $product_types, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une catégorie de produit']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('product_category_id', 'Catégorie') !!}
                    {!! Form::select('product_category_id', $product_categories, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une catégorie de produit']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('conversion_id', 'Unité') !!}
                    {!! Form::select('conversion_id', $conversions, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une conversion']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('stock_quantity', 'Quantitée en stock', ['class' => 'form-label']) !!}
                    {!! Form::number('stock_quantity', null, ['class' => 'form-control', 'required' => true, 'min' => 1, 'step' => 1]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('purchase_price', "Prix d'Achat") !!}
                    {!! Form::number('purchase_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('selling_price', "Prix de Vente") !!}
                    {!! Form::number('selling_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('rental_price', "Prix de Location") !!}
                    {!! Form::number('rental_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('serial_number', 'Numéro de série', ['class' => 'form-label']) !!}
                    {!! Form::text('serial_number',null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mark', 'Marque', ['class' => 'form-label']) !!}
                    {!! Form::text('mark', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('ref', 'Référence', ['class' => 'form-label']) !!}
                    {!! Form::text('ref', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('manufacture_date', 'Date de fabrication', ['class' => 'form-label']) !!}
                    {!! Form::date('manufacture_date', $product->manufacture_date, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('expiration_date', "Date d'expiration", ['class' => 'form-label']) !!}
                    {!! Form::date('expiration_date', $product->expiration_date, ['class' => 'form-control']) !!}
                </div>

                <div class="btn-group pull-right">
                    {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection

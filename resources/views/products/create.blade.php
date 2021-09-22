@extends('layouts.dashboard', ['title' => 'Ajouter un produit'])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::open(['method' => 'post', 'route' => 'product.store']) !!}

                <div class="form-group">
                    {!! Form::label('product_type_id', 'Type') !!}
                    {!! Form::select('product_type_id', $product_types, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez un type de produit']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('product_category_id', 'Catégorie') !!}
                    {!! Form::select('product_category_id', $product_categories, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une catégorie de produit']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('conversion_id', 'Unité') !!}
                    {!! Form::select('conversion_id', $conversions, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une unité']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nom') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('stock_quantity', 'Quantitée en stock') !!}
                    {!! Form::text('stock_quantity', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Entrer la quantitée en sotck']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Prix unitaire') !!}
                    {!! Form::number('price', null, ['class' => 'form-control', 'required' => true, 'Entrer le prix unitaire', 'step' =>'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('serial_number', 'Numéro de série', ['class' => 'form-label']) !!}
                    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('manufacture_date', 'Date de fabrication', ['class' => 'form-label']) !!}
                    {!! Form::date('manufacture_date', now(), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('expiration_date', "Date d'expiration", ['class' => 'form-label']) !!}
                    {!! Form::date('expiration_date', now(), ['class' => 'form-control']) !!}
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

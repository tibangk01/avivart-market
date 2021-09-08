@extends('layouts.dashboard', ['title' => 'Editer un produit'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::model($product, ['method' => 'put', 'route' => ['product.update', $product]]) !!}

                    <div class="form-group">
                        {!! Form::label('product_category_id', 'Catégorie') !!}
                        {!! Form::select('product_category_id', $product_categories, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une catégorie de produit']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('conversion_id', 'Unité') !!}
                        {!! Form::select('conversion_id', $conversions, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une conversion']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('currency_id', 'Dévises') !!}
                        {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une dévise']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $product->name, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', 'Prix Unitaire', ['class' => 'form-label']) !!}
                        {!! Form::text('price', $product->price, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('stock_quantity', 'Quantitée en stock', ['class' => 'form-label']) !!}
                        {!! Form::text('stock_quantity', $product->stock_quantity, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('sold_quantity', 'Quantitée vendue', ['class' => 'form-label']) !!}
                        {!! Form::text('sold_quantity', $product->sold_quantity, ['class' => 'form-control', 'required' => true]) !!}
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

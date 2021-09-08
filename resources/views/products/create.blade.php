@extends('layouts.dashboard', ['title' => 'Ajouter un produit'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['method' => 'post', 'route' => 'product.store']) !!}

                    <div class="form-group">
                        {!! Form::label('product_category_id', 'Catégorie de produit') !!}
                        {!! Form::select('product_category_id', $product_categories, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une catégorie de produit']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('conversion_id', 'Unité') !!}
                        {!! Form::select('conversion_id', $conversions, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une unité']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('currency_id', 'Devises') !!}
                        {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une devise']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom du produit') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('stock_quantity', 'Quantitée en stock') !!}
                        {!! Form::text('stock_quantity', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Entrer la quantitée en sotck']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('sold_quantity', 'Quantitée vendue') !!}
                        {!! Form::text('sold_quantity', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Entrer la quantitée vendue']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', 'Prix unitaire') !!}
                        {!! Form::text('price', null, ['class' => 'form-control', 'required' => true, 'Entrer le prix unitaire']) !!}
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

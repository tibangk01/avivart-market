@extends('layouts.dashboard', ['title' => 'Editer un produit'])

@section('body')

<section class="content">
    <div class="container-fluid">
        <!-- info boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Retour à la liste</a>
            </div>
            <div class="col-lg-12">
                {!! Form::model($product, ['method' => 'put', 'route' => ['product.update', $product]]) !!}

                <div class="form-group{{ $errors->has('product_category_id') ? ' has-error' : '' }}">
                    {!! Form::label('product_category_id', 'Catégories') !!}
                    {!! Form::select('product_category_id', $product_categories, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une catégorie de produit']) !!}
                    <small class="text-danger">{{ $errors->first('product_category_id') }}</small>
                </div>

                <div class="form-group{{ $errors->has('conversion_id') ? ' has-error' : '' }}">
                    {!! Form::label('conversion_id', 'Conversions') !!}
                    {!! Form::select('conversion_id', $conversions, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une conversion']) !!}
                    <small class="text-danger">{{ $errors->first('conversion_id') }}</small>
                </div>

                <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }}">
                    {!! Form::label('currency_id', 'Dévises') !!}
                    {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une dévise']) !!}
                    <small class="text-danger">{{ $errors->first('currency_id') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Dénomination', ['class' => 'form-label']) !!}
                    {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Prix Unitaire', ['class' => 'form-label']) !!}
                    {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('stock_quantity', 'Quantitée en stock', ['class' => 'form-label']) !!}
                    {!! Form::text('stock_quantity', $product->stock_quantity , ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('sold_quantity', 'Quantitée vendue', ['class' => 'form-label']) !!}
                    {!! Form::text('sold_quantity', $product->sold_quantity , ['class' => 'form-control']) !!}
                </div>

                <div class="btn-group pull-right">
                    {!! Form::reset('Annuler', ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection

@extends('layouts.dashboard', ['title' => 'Ajouter un produit'])

@section('body')

<section class="content">
    <div class="container-fluid">
        <!-- info boxes (Stat box) //TODO: redefine form error messages , msg for success and failed sale_place insertion -->
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['method' => 'post', 'route' => 'product.store']) !!}

                <div class="form-group{{ $errors->has('product_category_id') ? ' has-error' : '' }}">
                    {!! Form::label('product_category_id', 'Agences') !!}
                    {!! Form::select('product_category_id', $product_categories, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une catégorie de produit']) !!}
                    {{-- <small class="text-danger">{{ $errors->first('product_category_id') }}</small> --}}
                </div>
                <div class="form-group{{ $errors->has('conversion_id') ? ' has-error' : '' }}">
                    {!! Form::label('conversion_id', 'Conversions') !!}
                    {!! Form::select('conversion_id', $conversions, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une conversion']) !!}
                    {{-- <small class="text-danger">{{ $errors->first('conversion_id') }}</small> --}}
                </div>

                <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }}">
                    {!! Form::label('currency_id', 'Dévises') !!}
                    {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une dévise']) !!}
                    {{-- <small class="text-danger">{{ $errors->first('currency_id') }}</small> --}}
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', "Nom du produit") !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {{-- <small class="text-danger">{{ $errors->first('name') }}</small> --}}
                </div>

                <div class="form-group{{ $errors->has('stock_quantity') ? ' has-error' : '' }}">
                    {!! Form::label('stock_quantity', "Quantité en stock") !!}
                    {!! Form::text('stock_quantity', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {{-- <small class="text-danger">{{ $errors->first('name') }}</small> --}}
                </div>

                <div class="form-group{{ $errors->has('sold_quantity') ? ' has-error' : '' }}">
                    {!! Form::label('sold_quantity', "Quantité vendue") !!}
                    {!! Form::text('sold_quantity', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {{-- <small class="text-danger">{{ $errors->first('name') }}</small> --}}
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    {!! Form::label('price', "Prix unitaire") !!}
                    {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {{-- <small class="text-danger">{{ $errors->first('name') }}</small> --}}
                </div>



                <div class="btn-group pull-right">
                    {!! Form::reset('Annuler', ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


@endsection

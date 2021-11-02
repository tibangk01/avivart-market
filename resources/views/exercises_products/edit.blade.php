 @extends('layouts.dashboard', ['title' => "Exercice & Produit"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                {!! Form::model($exerciseProduct, ['method' => 'put', 'route' => ['exercise_product.update', $exerciseProduct]]) !!}
                <div class="form-group">
                    {!! Form::label('exercise_id', "Exercice") !!}
                    {!! Form::select('exercise_id', $exercises, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez un exercice"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('product_id', "Produit") !!}
                    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez un produit"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('initial_stock', 'Stock Initial') !!}
                    {!! Form::number('initial_stock', null, ['class' => 'form-control', 'required' => true, 'min' => 0, 'step' => 1]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('final_stock', 'Stock Final') !!}
                    {!! Form::number('final_stock', null, ['class' => 'form-control', 'required' => true, 'min' => 0, 'step' => 1]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('global_purchase_price', "Prix d'Achat Global") !!}
                    {!! Form::number('global_purchase_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('purchase_price', "Prix d'Achat Unitaire") !!}
                    {!! Form::number('purchase_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('global_selling_price', "Prix de Vente Global") !!}
                    {!! Form::number('global_selling_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('selling_price', "Prix de Vente Unitaire") !!}
                    {!! Form::number('selling_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('global_rental_price', "Prix de Location Global") !!}
                    {!! Form::number('global_rental_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('rental_price', "Prix de Location Unitaire") !!}
                    {!! Form::number('rental_price', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('loss', 'Perte') !!}
                    {!! Form::number('loss', null, ['class' => 'form-control', 'required' => true, 'min' => 0, 'step' => 1]) !!}
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
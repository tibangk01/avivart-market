 @extends('layouts.dashboard', ['title' => "Edition"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($productPurchase, ['method' => 'PUT', 'route' => ['product_purchase.update', $productPurchase]]) !!}

                <div class="form-group">
                    {!! Form::label('product_id', 'Produit') !!}
                    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez un produit']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('purchase_id', 'Bon de commande') !!}
                    {!! Form::select('purchase_id', $purchases, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez un bon de commande']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('ordered_quantity', 'Quantité Commandée') !!}
                    {!! Form::number('ordered_quantity', null, ['class' => 'form-control', 'required' => true, 'min' => 1, 'step' => 1]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('comment', 'Commentaire') !!}
                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
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
 @extends('layouts.dashboard', ['title' => "Edition"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($productOrder, ['method' => 'PUT', 'route' => ['product_order.update', $productOrder]]) !!}

                <div class="form-group">
                    {!! Form::label('product_id', 'Produit') !!}
                    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('order_id', 'Commande client') !!}
                    {!! Form::select('order_id', $orders, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
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
                    {!! Form::label('quantity', 'Quantité') !!}
                    {!! Form::number('quantity', null, ['class' => 'form-control', 'required' => true, 'min' => 1, 'step' => 1]) !!}
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
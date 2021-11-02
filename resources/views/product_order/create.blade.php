 @extends('layouts.dashboard', ['title' => "Enregistrement"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => 'product_order.store']) !!}

                <div class="form-group">
                    {!! Form::label('product_id', 'Produit') !!}
                    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez un produit']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('order_id', 'Commande') !!}
                    {!! Form::select('order_id', $orders, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une commande']) !!}
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
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
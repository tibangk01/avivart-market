 @extends('layouts.dashboard', ['title' => "Edition"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($productProforma, ['method' => 'PUT', 'route' => ['product_proforma.update', $productProforma]]) !!}

                <div class="form-group">
                    {!! Form::label('product_id', 'Produit') !!}
                    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('proforma_id', 'Proforma') !!}
                    {!! Form::select('proforma_id', $proformas, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('quantity', 'Quantité') !!}
                    {!! Form::number('quantity', null, ['class' => 'form-control', 'required' => true, 'min' => 1, 'step' => 1]) !!}
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
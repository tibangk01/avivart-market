 @extends('layouts.dashboard', ['title' => "Enregistrement"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => 'product_proforma.store']) !!}

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
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
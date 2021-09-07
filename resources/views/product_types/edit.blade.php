@extends('layouts.dashboard', ['title' => "Editer le type de produit"])

@section('body')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($productType, ['method' => 'PUT', 'route' => ['product_type.update',  $productType]]) !!}

                <div class="form-group">
                    {!! Form::label('name', "Nom") !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Nom"]) !!}
                </div>

                 <div class="form-group text-right">
                    {!! Form::submit('Modifier', ['class' => 'btn btn-warning']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
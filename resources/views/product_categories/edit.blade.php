 @extends('layouts.dashboard', ['title' => "Editer la catégorie de produit"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::model($productCategory, ['method' => 'PUT', 'route' => ['product_category.update',  $productCategory]]) !!}

                <div class="form-group">
                    {!! Form::label('name', "Nom") !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Nom"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('product_ray_id', 'Rayon') !!}
                    {!! Form::select('product_ray_id', $productRays, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un rayon']) !!}
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
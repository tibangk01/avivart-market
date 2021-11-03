 @extends('layouts.dashboard', ['title' => "Catégorie de produit"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::open(['method' => 'POST', 'route' => 'product_category.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', "Nom") !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Nom"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('product_ray_id', 'Rayon') !!}
                    {!! Form::select('product_ray_id', $productRays, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un rayon']) !!}
                </div>

                 <div class="form-group text-right">
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
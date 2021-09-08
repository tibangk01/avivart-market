
@extends('layouts.dashboard', ['title' => "Ajouter un type d'unité"])

@section('body')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => 'conversion.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', "Nom") !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Nom"]) !!}
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

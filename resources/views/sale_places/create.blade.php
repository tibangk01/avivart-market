@extends('layouts.dashboard', ['title' => 'Ajouter un point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['method' => 'POST', 'route' => 'sale_place.store']) !!}

                    <div class="form-group">
                        {!! Form::label('agency_id', 'Agence') !!}
                        {!! Form::select('agency_id', $agencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une agence']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
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

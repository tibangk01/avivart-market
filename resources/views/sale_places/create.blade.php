@extends('layouts.dashboard', ['title' => 'Point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                    {!! Form::open(['method' => 'POST', 'route' => 'sale_place.store']) !!}

                    <div class="form-group">
                        {!! Form::label('country_id', 'Pays') !!}
                        {!! Form::select('country_id', $countries, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez un pays']) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('agency_id', 'Agence') !!}
                        {!! Form::select('agency_id', $agencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une agence']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', 'Téléphone') !!}
                        {!! Form::text('phone_number', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('website', 'Site web') !!}
                        {!! Form::text('website', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', "Adresse", ['class' => 'form-label']) !!}
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('postal_code', 'Code Postal', ['class' => 'form-label']) !!}
                        {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('city', "Ville", ['class' => 'form-label']) !!}
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
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

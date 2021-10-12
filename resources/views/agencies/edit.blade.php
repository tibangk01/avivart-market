@extends('layouts.dashboard', ['title' => 'Editer une agence'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Text</h4>
                </div>
                <div class="col-lg-6">
                    {!! Form::model($agency, ['method' => 'PUT', 'route' => ['agency.update', $agency]]) !!}

                    <div class="form-group">
                        {!! Form::label('country_id', 'Pays') !!}
                        {!! Form::select('country_id', $countries, $agency->enterprise->country_id, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez un pays']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('society_id', 'Société') !!}
                        {!! Form::select('society_id', $societies, $agency->society_id, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une société']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('region_id', 'Choisissez une région') !!}
                        {!! Form::select('region_id', $regions, $agency->enterprise->region_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une région']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $agency->enterprise->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', 'Téléphone', ['class' => 'form-label']) !!}
                        {!! Form::text('phone_number', $agency->enterprise->phone_number, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                        {!! Form::email('email', $agency->enterprise->email, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('website', 'Site web', ['class' => 'form-label']) !!}
                        {!! Form::text('website', $agency->enterprise->website, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', 'Adresse', ['class' => 'form-label']) !!}
                        {!! Form::text('address', $agency->enterprise->address, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('postal_code', 'Code Postal', ['class' => 'form-label']) !!}
                        {!! Form::text('postal_code', $agency->enterprise->postal_code, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('city', 'Ville', ['class' => 'form-label']) !!}
                        {!! Form::text('city', $agency->enterprise->city, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group text-right">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

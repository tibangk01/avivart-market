@extends('layouts.dashboard', ['title' => "Société"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::model($society, ['method' => 'put', 'route' => ['society.update', $society]]) !!}

                <div class="form-group">
                    {!! Form::label('country_id', 'Pays') !!}
                    {!! Form::select('country_id', $countries, $society->enterprise->country_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('region_id', 'Région') !!}
                    {!! Form::select('region_id', $regions, $society->enterprise->region_id, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une région']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                    {!! Form::text('name', $society->enterprise->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone_number', 'Téléphone', ['class' => 'form-label']) !!}
                    {!! Form::text('phone_number', $society->enterprise->phone_number, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                    {!! Form::email('email', $society->enterprise->email, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Adresse', ['class' => 'form-label']) !!}
                    {!! Form::text('address', $society->enterprise->address, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('postal_code', 'Code Postal', ['class' => 'form-label']) !!}
                    {!! Form::text('postal_code', $society->enterprise->postal_code, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Ville', ['class' => 'form-label']) !!}
                    {!! Form::text('city', $society->enterprise->city, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('website', 'Site web', ['class' => 'form-label']) !!}
                    {!! Form::text('website', $society->enterprise->website, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tppcr', 'RCCM', ['class' => 'form-label']) !!}
                    {!! Form::text('tppcr', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fiscal_code', 'NIF', ['class' => 'form-label']) !!}
                    {!! Form::text('fiscal_code', null, ['class' => 'form-control']) !!}
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

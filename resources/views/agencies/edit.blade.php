@extends('layouts.dashboard', ['title' => 'Editer une agence'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::model($agency, ['method' => 'PUT', 'route' => ['agency.update', $agency]]) !!}

                        {!! Form::label('region_id', 'Choisissez une région') !!}
                        {!! Form::select('region_id', $regions, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisir une région']) !!}

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
                    <div class="form-group text-right">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

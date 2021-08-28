@extends('layouts.dashboard', ['title' => 'Editer Une agence'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="{{ route('agency.index') }}"> Retour à la liste</a>
                </div>
                <div class="col-lg-12">
                    {!! Form::model($agency, ['method' => 'PUT', 'route' => ['agency.update', $agency]]) !!}

                    <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                        {!! Form::label('region_id', 'Choisissez une région') !!}
                        {!! Form::select('region_id', $regions, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisir une région']) !!}
                        <small class="text-danger">{{ $errors->first('region_id') }}</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom de l\'agence', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $agency->enterprise->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_number', 'Téléphone de l\'agence', ['class' => 'form-label']) !!}
                        {!! Form::text('phone_number', $agency->enterprise->phone_number, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Adresse de l\'agence', ['class' => 'form-label']) !!}
                        {!! Form::text('address', $agency->enterprise->address, ['class' => 'form-control']) !!}
                    </div>
                    <div class="btn-group pull-right">
                        {!! Form::reset('Annuler', ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

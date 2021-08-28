@extends('layouts.dashboard', ['title' => 'Ajouter Une Agence'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) //TODO: redefine form error messages , msg for success and failed agency insertion -->
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['method' => 'POST', 'route' => 'agency.store']) !!}

                    <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                        {!! Form::label('region', 'Régions') !!}
                        {!! Form::select('region_id', $regions, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une région']) !!}
                        <small class="text-danger">{{ $errors->first('region') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nom de l\'agence') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        {!! Form::label('phone_number', 'Téléphone') !!}
                        {!! Form::text('phone_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('phone_number') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Adresse de l\'agence') !!}
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>

                    <div class="btn-group pull-right">
                        {!! Form::reset('Annuler', ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

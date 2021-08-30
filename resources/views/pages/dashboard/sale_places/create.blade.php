@extends('layouts.dashboard', ['title' => 'Ajouter Un point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) //TODO: redefine form error messages , msg for success and failed sale_place insertion -->
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['method' => 'POST', 'route' => 'sale_place.store']) !!}

                    <div class="form-group{{ $errors->has('agency_id') ? ' has-error' : '' }}">
                        {!! Form::label('agency_id', 'Agences') !!}
                        {!! Form::select('agency_id', $agencies, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une agence']) !!}
                        <small class="text-danger">{{ $errors->first('agency_id') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nom du point de vente') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('name') }}</small>
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

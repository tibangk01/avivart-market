@extends('layouts.main', ['title' => $society->enterprise->name])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::model($society, ['method' => 'PUT', 'route' => ['society.update', $society]]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nom de la société', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $society->enterprise->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_number', 'Téléphone de la société', ['class' => 'form-label']) !!}
                        {!! Form::text('phone_number', $society->enterprise->phone_number, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Adresse de la société', ['class' => 'form-label']) !!}
                        {!! Form::text('address', $society->enterprise->address, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('website', 'Site web de la société', ['class' => 'form-label']) !!}
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
                    <div class="btn-group pull-right">
                        {!! Form::reset('Annuler', ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit('Valider', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

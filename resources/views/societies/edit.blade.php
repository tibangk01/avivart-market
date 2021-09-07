@extends('layouts.dashboard', ['title' => $society->enterprise->name])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::model($society, ['method' => 'put', 'route' => ['society.update', $society]]) !!}
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

@extends('layouts.dashboard', ['title' => 'Banque'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">

                {!! Form::open(['method' => 'POST', 'route' => 'bank.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nom') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('account_number', 'N° de compte') !!}
                    {!! Form::text('account_number', null, ['class' => 'form-control', 'required' => true]) !!}
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
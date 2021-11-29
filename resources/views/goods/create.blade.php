@extends('layouts.dashboard', ['title' => 'Amortissement de bien'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">

                {!! Form::open(['method' => 'POST', 'route' => 'good.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Désignation du bien') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('ref', 'Référence') !!}
                    {!! Form::text('ref', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date_of_service', 'Date de mise en service') !!}
                    {!! Form::date('date_of_service', null, ['class' => 'form-control', 'required' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('original_value', "Valeur d'origine") !!}
                    {!! Form::number('original_value', null, ['class' => 'form-control', 'required' => true, 'step' => 'any', 'min' => 0]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('rate_charged', 'Taux pratiqué') !!}
                    {!! Form::number('rate_charged', null, ['class' => 'form-control', 'required' => true, 'step' => 'any', 'min' => 0]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('amortization_year', "Année d'amortissement") !!}
                    {!! Form::number('amortization_year', null, ['class' => 'form-control', 'required' => true, 'minlength' => 4, 'maxlength' => 4]) !!}
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
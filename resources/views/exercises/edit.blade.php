@extends('layouts.dashboard', ['title' => "Période d'inventaire"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::model($exercise, ['method' => 'PUT', 'route' => ['exercise.update',  $exercise]]) !!}

                <div class="form-group">
                    {!! Form::label('currency_id', 'Devise') !!}
                    {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Titre') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Titre"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('real_sale', "Vente Réelle") !!}
                    {!! Form::number('real_sale', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Vente Réelle", 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('start_date', "Date de Début") !!}
                    {!! Form::date('start_date', $exercise->start_date, ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Début"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('end_date', "Date de Fin") !!}
                    {!! Form::date('end_date', $exercise->end_date, ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Fin"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('created_at', "Date de Création") !!}
                    {!! Form::date('created_at', $exercise->created_at, ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Création"]) !!}
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
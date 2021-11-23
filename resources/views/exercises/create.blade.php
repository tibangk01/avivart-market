 @extends('layouts.dashboard', ['title' => "Période d'inventaire"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::open(['method' => 'POST', 'route' => 'exercise.store']) !!}

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
                    {!! Form::number('real_sale', 0, ['class' => 'form-control', 'required' => true, 'placeholder' => "Vente Réelle", 'step' => 'any']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('start_date', "Date de Début") !!}
                    {!! Form::date('start_date', now(), ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Début"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('end_date', "Date de Fin") !!}
                    {!! Form::date('end_date', now()->addDay(), ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Fin"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('created_at', "Date de Création") !!}
                    {!! Form::date('created_at', now(), ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Création"]) !!}
                </div>

                <div class="form-group text-right">
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
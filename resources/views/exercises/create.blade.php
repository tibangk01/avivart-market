 @extends('layouts.dashboard', ['title' => "Ajouter un exercice"])

@section('body')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => 'exercise.store']) !!}

                <div class="form-group">
                    {!! Form::label('currency_id', 'Devises') !!}
                    {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une devise']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Titre') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('start_date', "Date de Début") !!}
                    {!! Form::date('start_date', now(), ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Début"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('end_date', "Date de Fin") !!}
                    {!! Form::date('end_date', now(), ['class' => 'form-control', 'required' => true, 'placeholder' => "Date de Fin"]) !!}
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
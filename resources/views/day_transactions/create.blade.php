@extends('layouts.dashboard', ['title' => 'Ajouter une transaction de journée'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">

                    {!! Form::open(['method' => 'POST', 'route' => 'day_transaction.store']) !!}
                    <div class="form-group">
                        {!! Form::label('exercise_id', 'Période') !!}
                        {!! Form::select('exercise_id', $exercises, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une période']) !!}
                    </div>

                    <div class="form-group">

                        <label for="valueOne" class="form-label">
                            {!! Form::radio('state', '0', null, ['id' => 'valueOne']) !!} Fermer ?
                        </label>

                        &nbsp;&nbsp;&nbsp;

                        <label for="valueTwo" class="form-label">
                            {!! Form::radio('state', '1', true, ['id' => 'valueTwo']) !!} Ouvert ?
                        </label>

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
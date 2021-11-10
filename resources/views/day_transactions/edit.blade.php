@extends('layouts.dashboard', ['title' => 'Transaction de journée'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                    {!! Form::model($dayTransaction, ['method' => 'put', 'route' => ['day_transaction.update', $dayTransaction]]) !!}

                    <div class="form-group">
                        {!! Form::label('exercise_id', "Période d'inventaire") !!}
                        {!! Form::select('exercise_id', $exercises, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une période']) !!}
                    </div>

                    <div class="form-group">

                        <label for="valueOne" class="form-label">
                            {!! Form::radio('state', '0', null, ['id' => 'valueOne']) !!} Fermer ?
                        </label>

                        &nbsp;&nbsp;&nbsp;

                        <label for="valueTwo" class="form-label">
                            {!! Form::radio('state', '1', null, ['id' => 'valueTwo']) !!} Ouvert ?
                        </label>

                    </div>

                    <div class="form-group text-right">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

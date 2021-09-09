@extends('layouts.dashboard', ['title' => "Ajouter un type d'opération de caisse"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::open(['method' => 'post', 'route' => 'cash_register_operation_type.store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">

                        <label for="valueOne" class="form-label">
                            {!! Form::radio('is_opening', '0', null, ['id' => 'valueOne']) !!} Fermeture ?
                        </label>

                        &nbsp;&nbsp;&nbsp;

                        <label for="valueTwo" class="form-label">
                            {!! Form::radio('is_opening', '1', null, ['id' => 'valueTwo']) !!} Ouverture ?
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

@extends('layouts.dashboard', ['title' => "Editer un type d'opération de caisse"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::model($cashRegisterOperationType, ['method' => 'put', 'route' => ['cash_register_operation_type.update', $cashRegisterOperationType]]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Dénomination', ['class' => 'form-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">

                        <label for="test" class="form-label">
                            {!! Form::radio('is_opening', '0', null, ['id' => 'test']) !!}  Fermeture ?
                        </label>

                            &nbsp;&nbsp;&nbsp;

                        <label for="test2" class="form-label">
                            {!! Form::radio('is_opening', '1', null, ['id' => 'test2']) !!}  Ouverture ?
                        </label>

                    </div>

                    <div class="form-group text-right">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </section>
@endsection

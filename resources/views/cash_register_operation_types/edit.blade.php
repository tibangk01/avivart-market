@extends('layouts.dashboard', ['title' => "Type d'opération de caisse"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">

                    {!! Form::model($cashRegisterOperationType, ['method' => 'put', 'route' => ['cash_register_operation_type.update', $cashRegisterOperationType]]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Dénomination', ['class' => 'form-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">

                        <label for="valueOne" class="form-label">
                            {!! Form::radio('state', '0', null, ['id' => 'valueOne']) !!}  Sortie ?
                        </label>

                            &nbsp;&nbsp;&nbsp;

                        <label for="valueTwo" class="form-label">
                            {!! Form::radio('state', '1', null, ['id' => 'valueTwo']) !!}  Entrée ?
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

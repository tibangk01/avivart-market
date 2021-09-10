@extends('layouts.dashboard', ['title' => "Editer une opération de caisse"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::model($cashRegisterOperation, ['method' => 'PUT', 'route' => ['cash_register_operation.update', $cashRegisterOperation]]) !!}

                    <div class="form-group">
                        {!! Form::label('cash_register_operation_type_id', "Type d'opération de caisse") !!}
                        {!! Form::select('cash_register_operation_type_id', $cashRegisterOperationTypes , null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez un type d'opération de caisse"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', $cashRegisterOperation->name, ['class' => 'form-control', 'required' => true]) !!}
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

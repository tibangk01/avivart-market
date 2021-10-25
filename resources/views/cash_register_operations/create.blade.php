@extends('layouts.dashboard', ['title' => "Ajouter une opération de caisse"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">

                    {!! Form::open(['method' => 'post', 'route' => 'cash_register_operation.store']) !!}

                    <div class="form-group">
                        {!! Form::label('cash_register_operation_type_id', "Type d'opération de caisse") !!}
                        {!! Form::select('cash_register_operation_type_id', $cashRegisterOperationTypes, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez un type d'opération de caisse"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('amount', 'Montant') !!}
                        {!! Form::number('amount', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('comment', 'Commentaire') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'required' => true]) !!}
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



@extends('layouts.dashboard', ['title' => "Opération de banque"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::open(['method' => 'post', 'route' => 'bank_operation.store']) !!}

                    <div class="form-group">
                        {!! Form::label('bank_id', "Banque") !!}
                        {!! Form::select('bank_id', $banks, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('bank_operation_type_id', "Type d'opération de banque") !!}
                        {!! Form::select('bank_operation_type_id', $bankOperationTypes, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('amount', 'Montant') !!}
                        {!! Form::number('amount', null, ['class' => 'form-control', 'required' => true, 'step' => 'any']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('comment', 'Commentaire') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
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




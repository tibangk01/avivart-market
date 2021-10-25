@extends('layouts.dashboard', ['title' => 'Ajouter une transaction de caisse'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">

                    {!! Form::open(['method' => 'POST', 'route' => 'cash_register_transaction.store']) !!}
                    <div class="form-group">
                        {!! Form::label('day_transaction_id', 'Transaction de journée') !!}
                        {!! Form::select('day_transaction_id', $dayTransactions, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une transaction de journée']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('staff_id', 'Staff') !!}
                        {!! Form::select('staff_id', $staffs, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez un staff']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cash_register_id', 'Caisse') !!}
                        {!! Form::select('cash_register_id', $cashRegisters, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une caisse']) !!}
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
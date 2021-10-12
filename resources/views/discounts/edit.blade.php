@extends('layouts.dashboard', ['title' => "Editer la remise"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::model($discount, ['method' => 'PUT', 'route' => ['discount.update',  $discount]]) !!}

                <div class="form-group">
                    {!! Form::label('amount', "Montant") !!}
                    {!! Form::number('amount', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Montant"]) !!}
                </div>

                 <div class="form-group text-right">
                    {!! Form::submit('Modifier', ['class' => 'btn btn-warning']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
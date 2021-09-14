@extends('layouts.dashboard', ['title' => "Editer la remise"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
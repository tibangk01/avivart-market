@extends('layouts.dashboard', ['title' => "TVA"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::model($vat, ['method' => 'PUT', 'route' => ['vat.update',  $vat]]) !!}

                <div class="form-group">
                    {!! Form::label('percentage', "Pourcentage") !!}
                    {!! Form::number('percentage', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Pourcentage", 'step' => 'any']) !!}
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
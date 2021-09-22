@extends('layouts.dashboard', ['title' => "Editer un type d'unité"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::model($conversion, ['method' => 'put', 'route' => ['conversion.update',  $conversion]]) !!}

                <div class="form-group">
                    {!! Form::label('name', "Nom") !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Nom"]) !!}
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

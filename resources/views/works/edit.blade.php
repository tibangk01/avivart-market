@extends('layouts.dashboard', ['title' => "Editer la profession"])

@section('body')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($work, ['method' => 'PUT', 'route' => ['work.update',  $work]]) !!}

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
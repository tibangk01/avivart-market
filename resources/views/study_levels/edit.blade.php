@extends('layouts.dashboard', ['title' => "Niveau d'étude"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                    {!! Form::model($studyLevel, ['method' => 'PUT', 'route' => ['study_level.update', $studyLevel]]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
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

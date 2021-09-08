// custom here
@extends('layouts.dashboard', ['title' => 'Editer une agence'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    //custom here
                    {!! Form::model($agency, ['method' => 'PUT', 'route' => ['agency.update', $agency]]) !!}
                    <div class="form-group">
                        {!! Form::label('region_id', 'Choisissez une région') !!}
                        {!! Form::select('region_id', $regions, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une région']) !!}
                    </div>

                    // custom here
                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $agency->enterprise->name, ['class' => 'form-control']) !!}
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

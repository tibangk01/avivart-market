@extends('layouts.dashboard', ['title' => 'Editer une banque '])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::model($bank, ['method' => 'put', 'route' => ['bank.update', $bank]]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('account', 'N° de compte', ['class' => 'form-label']) !!}
                        {!! Form::text('account', null, ['class' => 'form-control']) !!}
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

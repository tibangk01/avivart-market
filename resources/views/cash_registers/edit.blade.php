@extends('layouts.dashboard', ['title' => 'Editer une caisse'])


@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::model($cashRegister, ['method' => 'PUT', 'route' => ['cash_register.update', $cashRegister]]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $cashRegister->name, ['class' => 'form-control']) !!}
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

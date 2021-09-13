@extends('layouts.dashboard', ['title' => 'Editer un personnel'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::model($staff, ['method' => 'put', 'route' => ['staff.update', $staff]]) !!}

                    <div class="form-group">
                        {!! Form::label('civility_id', 'Civilité') !!}
                        {!! Form::select('civility_id', $civilities, $staff->human->user->civility->id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une civilité']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('staff_type_id', 'Fonction') !!}
                        {!! Form::select('staff_type_id', $staffTypes, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une fonction']) !!}
                    </div>

                    {{-- <div class="form-group">
                        {!! Form::label('signature', 'Signature numérique', ['class' => 'form-label']) !!}
                        {!! Form::text('signature', null, ['class' => 'form-control']) !!}
                    </div> --}}

                    <div class="form-group">
                        {!! Form::label('last_name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('last_name', $staff->human->user->last_name , ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('first_name', 'Prénom', ['class' => 'form-label']) !!}
                        {!! Form::text('first_name', $staff->human->user->first_name, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', 'Téléphone', ['class' => 'form-label']) !!}
                        {!! Form::text('phone_number', $staff->human->user->phone_number, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                        {!! Form::email('email', $staff->human->user->email, ['class' => 'form-control']) !!}
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

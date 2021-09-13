@extends('layouts.dashboard', ['title' => 'Ajouter un staff'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::open(['method' => 'post', 'route' => 'staff.store']) !!}

                    <div class="form-group">
                        {!! Form::label('country_id', 'Pays') !!}
                        {!! Form::select('country_id', $countries, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('role_id', 'Rôle') !!}
                        {!! Form::select('role_id', $roles, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un rôle']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('civility_id', 'Civilité') !!}
                        {!! Form::select('civility_id', $civilities, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une civilité']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('work_id', "Fonction") !!}
                        {!! Form::select('work_id', $works, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une fonction']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('staff_type_id', "Type de staff") !!}
                        {!! Form::select('staff_type_id', $staffTypes, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un type']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('username', "Nom d'utilisateur", ['class' => 'form-label']) !!}
                        {!! Form::text('username', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('signature', 'Signature numérique', ['class' => 'form-label']) !!}
                        {!! Form::text('signature', null, ['class' => 'form-control']) !!}
                        <span class="help-text">5 caractères max</span>
                    </div>

                    <div class="form-group">
                        {!! Form::label('last_name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('first_name', 'Prénom', ['class' => 'form-label']) !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', 'Téléphone', ['class' => 'form-label']) !!}
                        {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', "Adresse", ['class' => 'form-label']) !!}
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('city', "Ville", ['class' => 'form-label']) !!}
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group text-right">
                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

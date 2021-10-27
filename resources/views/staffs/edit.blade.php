@extends('layouts.dashboard', ['title' => 'Editer le staff'])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::model($staff, ['method' => 'put', 'route' => ['staff.update', $staff]]) !!}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('country_id', 'Pays') !!}
                            {!! Form::select('country_id', $countries, $staff->human->user->country_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('civility_id', 'Civilité') !!}
                            {!! Form::select('civility_id', $civilities, $staff->human->user->civility_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une civilité']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('work_id', "Fonction") !!}
                            {!! Form::select('work_id', $works, $staff->human->work_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir une fonction']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('staff_type_id', "Type de staff") !!}
                            {!! Form::select('staff_type_id', $staffTypes, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un type']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contract_type_id', "Type de contrat") !!}
                            {!! Form::select('contract_type_id', $contractTypes, $staff->human->contract_type_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un type de contrat']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('study_level_id', "Niveau d'étude") !!}
                            {!! Form::select('study_level_id', $studyLevels, $staff->human->study_level_id, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisir un niveau d'étude"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('username', "Nom d'utilisateur", ['class' => 'form-label']) !!}
                            {!! Form::text('username', $staff->human->username, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('signature', 'Signature numérique (5 caractères max)', ['class' => 'form-label']) !!}
                            {!! Form::text('signature', $staff->human->signature, ['class' => 'form-control', 'maxlength' => 5]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', 'Nom', ['class' => 'form-label']) !!}
                            {!! Form::text('last_name', $staff->human->user->last_name , ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('first_name', 'Prénoms', ['class' => 'form-label']) !!}
                            {!! Form::text('first_name', $staff->human->user->first_name, ['class' => 'form-control', 'required' => true]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                            {!! Form::email('email', $staff->human->user->email, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone_number', 'Téléphone', ['class' => 'form-label']) !!}
                            {!! Form::text('phone_number', $staff->human->user->phone_number, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('city', "Ville", ['class' => 'form-label']) !!}
                            {!! Form::text('city', $staff->human->user->city, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', "Adresse", ['class' => 'form-label']) !!}
                            {!! Form::text('address', $staff->human->user->address, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('date_of_birth', "Date de naissance", ['class' => 'form-label']) !!}
                            {!! Form::date('date_of_birth',$staff->human->date_of_birth, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('place_of_birth', "Lieu de naissance", ['class' => 'form-label']) !!}
                            {!! Form::text('place_of_birth', $staff->human->place_of_birth, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('hiring_date', "Date d'embauche", ['class' => 'form-label']) !!}
                            {!! Form::date('hiring_date', $staff->human->hiring_date, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contract_end_date', 'Date de fin de contrat', ['class' => 'form-label']) !!}
                            {!! Form::date('contract_end_date', $staff->human->contract_end_date, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group text-right">
                            {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection

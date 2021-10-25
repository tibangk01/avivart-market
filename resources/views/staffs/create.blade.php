@extends('layouts.dashboard', ['title' => 'Ajouter un staff'])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['method' => 'post', 'route' => 'staff.store']) !!}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('country_id', 'Pays') !!}
                            {!! Form::select('country_id', $countries, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
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
                            {!! Form::label('contract_type_id', "Type de contrat") !!}
                            {!! Form::select('contract_type_id', $contractTypes, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un type de contrat']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('study_level_id', "Niveau d'étude") !!}
                            {!! Form::select('study_level_id', $studyLevels, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisir un niveau d'étude"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('username', "Nom d'utilisateur", ['class' => 'form-label']) !!}
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('signature', 'Signature numérique', ['class' => 'form-label']) !!}
                            {!! Form::text('signature', null, ['class' => 'form-control', 'max' => 5]) !!}
                            <span class="help-text">5 caractères max</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
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

                        <div class="form-group">
                            {!! Form::label('date_of_birth', "Date de naissance", ['class' => 'form-label']) !!}
                            {!! Form::date('date_of_birth', now(), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('place_of_birth', "Lieu de naissance", ['class' => 'form-label']) !!}
                            {!! Form::text('place_of_birth', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('hiring_date', "Date d'embauche", ['class' => 'form-label']) !!}
                            {!! Form::date('hiring_date', now(), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contract_end_date', 'Date de fin de contrat', ['class' => 'form-label']) !!}
                            {!! Form::date('contract_end_date', now(), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group text-right">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
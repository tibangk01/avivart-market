<div>
    {!! Form::model($provider, ['method' => 'put', 'route' => ['provider.update', $provider]]) !!}
    {!! Form::hidden('form', 'person') !!}

    <div class="form-group">
        {!! Form::label('country_id', 'Pays') !!}
        {!! Form::select('country_id', $countries, $provider->person->user->country_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('civility_id', 'Civilité') !!}
        {!! Form::select('civility_id', $civilities, $provider->person->user->civility_id, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une civilité']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('person_ray_id', 'Type de fournisseur') !!}
        {!! Form::select('person_ray_id', $personRays, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez un type de fournisseur']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('last_name', 'Nom') !!}
        {!! Form::text('last_name', $provider->person->user->last_name, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('first_name', 'Prénoms') !!}
        {!! Form::text('first_name', $provider->person->user->first_name, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone_number', 'Téléphone') !!}
        {!! Form::text('phone_number', $provider->person->user->phone_number, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', $provider->person->user->email, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address', "Adresse", ['class' => 'form-label']) !!}
        {!! Form::text('address', $provider->person->user->address, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', "Ville", ['class' => 'form-label']) !!}
        {!! Form::text('city', $provider->person->user->city, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group text-right">
        {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
</div>
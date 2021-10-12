<div>
    {!! Form::open(['method' => 'POST', 'route' => 'provider.store']) !!}
    {!! Form::hidden('form', 'corporation') !!}

    <div class="form-group">
        {!! Form::label('country_id', 'Pays') !!}
        {!! Form::select('country_id', $countries, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('region_id', 'Région') !!}
        {!! Form::select('region_id', $regions, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une région']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('person_ray_id', 'Rayon') !!}
        {!! Form::select('person_ray_id', $personRays, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez un rayon']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone_number', 'Téléphone') !!}
        {!! Form::text('phone_number', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('website', 'Site web') !!}
        {!! Form::text('website', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address', "Adresse", ['class' => 'form-label']) !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
                    {!! Form::label('postal_code', 'Code Postal', ['class' => 'form-label']) !!}
                    {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
                </div>

    <div class="form-group">
        {!! Form::label('city', "Ville", ['class' => 'form-label']) !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tppcr', 'RCCM', ['class' => 'form-label']) !!}
        {!! Form::text('tppcr', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fiscal_code', 'NIF', ['class' => 'form-label']) !!}
        {!! Form::text('fiscal_code', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group text-right">
        {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
</div>
<div>
    {!! Form::model($provider, ['method' => 'put', 'route' => ['provider.update', $provider]]) !!}
    {!! Form::hidden('form', 'corporation') !!}

    <div class="form-group">
        {!! Form::label('country_id', 'Pays') !!}
        {!! Form::select('country_id', $countries, $provider->corporation->enterprise->country_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('region_id', 'Région') !!}
        {!! Form::select('region_id', $regions, $provider->corporation->enterprise->region_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une région']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('person_ray_id', 'Rayon') !!}
        {!! Form::select('person_ray_id', $personRays, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez un rayon']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name', $provider->corporation->enterprise->name, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone_number', 'Téléphone') !!}
        {!! Form::text('phone_number', $provider->corporation->enterprise->phone_number, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', $provider->corporation->enterprise->email, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('website', 'Site web') !!}
        {!! Form::text('website', $provider->corporation->enterprise->website, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address', "Adresse", ['class' => 'form-label']) !!}
        {!! Form::text('address', $provider->corporation->enterprise->address, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', "Ville", ['class' => 'form-label']) !!}
        {!! Form::text('city', $provider->corporation->enterprise->city, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tppcr', 'RCCM', ['class' => 'form-label']) !!}
        {!! Form::text('tppcr', $provider->corporation->tppcr, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fiscal_code', 'NIF', ['class' => 'form-label']) !!}
        {!! Form::text('fiscal_code', $provider->corporation->fiscal_code, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group text-right">
        {!! Form::submit('Modifier', ['class' => 'btn btn-warning']) !!}
    </div>
    {!! Form::close() !!}
</div>
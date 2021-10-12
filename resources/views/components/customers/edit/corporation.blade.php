<div>
    {!! Form::model($customer, ['method' => 'put', 'route' => ['customer.update', $customer]]) !!}
    {!! Form::hidden('form', 'corporation') !!}

    <div class="form-group">
        {!! Form::label('country_id', 'Pays') !!}
        {!! Form::select('country_id', $countries, $customer->corporation->enterprise->country_id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisir un pays']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('region_id', 'Région') !!}
        {!! Form::select('region_id', $regions, $customer->corporation->enterprise->region_id, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une région']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('person_ray_id', 'Rayon') !!}
        {!! Form::select('person_ray_id', $personRays, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez un rayon']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name', $customer->corporation->enterprise->name, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone_number', 'Téléphone') !!}
        {!! Form::text('phone_number', $customer->corporation->enterprise->phone_number, ['class' => 'form-control', 'required' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', $customer->corporation->enterprise->email, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('website', 'Site web') !!}
        {!! Form::text('website', $customer->corporation->enterprise->website, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address', "Adresse", ['class' => 'form-label']) !!}
        {!! Form::text('address', $customer->corporation->enterprise->address, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
                    {!! Form::label('postal_code', 'Code Postal', ['class' => 'form-label']) !!}
                    {!! Form::text('postal_code', $customer->corporation->enterprise->postal_code, ['class' => 'form-control']) !!}
                </div>

    <div class="form-group">
        {!! Form::label('city', "Ville", ['class' => 'form-label']) !!}
        {!! Form::text('city', $customer->corporation->enterprise->city, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tppcr', 'RCCM', ['class' => 'form-label']) !!}
        {!! Form::text('tppcr', $customer->corporation->tppcr, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fiscal_code', 'NIF', ['class' => 'form-label']) !!}
        {!! Form::text('fiscal_code', $customer->corporation->fiscal_code, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group text-right">
        {!! Form::submit('Modifier', ['class' => 'btn btn-warning']) !!}
    </div>
    {!! Form::close() !!}
</div>
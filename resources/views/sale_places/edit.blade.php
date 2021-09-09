@extends('layouts.dashboard', ['title' => 'Editer un point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::model($salePlace, ['method' => 'PUT', 'route' => ['sale_place.update', $salePlace]]) !!}
                    <div class="form-group">
                        {!! Form::label('agency_id', 'Agence') !!}
                        {!! Form::select('agency_id', $agencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une agence', 'disabled' => true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $salePlace->enterprise->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_number', 'Téléphone', ['class' => 'form-label']) !!}
                        {!! Form::text('phone_number', $salePlace->enterprise->phone_number, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                        {!! Form::email('email', $salePlace->enterprise->email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('website', 'Site web', ['class' => 'form-label']) !!}
                        {!! Form::text('website', $salePlace->enterprise->website, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Adresse', ['class' => 'form-label']) !!}
                        {!! Form::text('address', $salePlace->enterprise->address, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group text-right">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-warning']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.dashboard', ['title' => 'Editer un point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::model($salePlace, ['method' => 'put', 'route' => ['sale_place.update', $salePlace]]) !!}

                    <div class="form-group">
                        {!! Form::label('agency_id', 'Agence') !!}
                        {!! Form::select('agency_id', $agencies, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une agence']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $salePlace->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group text-right">
                        {!! Form::reset('Modifier', ['class' => 'btn btn-warning']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

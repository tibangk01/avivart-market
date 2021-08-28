@extends('layouts.main', ['title' => 'Editer Un point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="{{ route('sale_place.index') }}"> Retour à la liste</a>
                </div>
                <div class="col-lg-12">
                    {!! Form::model($salePlace, ['method' => 'put', 'route' => ['sale_place.update', $salePlace]]) !!}

                    <div class="form-group{{ $errors->has('agency_id') ? ' has-error' : '' }}">
                        {!! Form::label('agency_id', 'Agences') !!}
                        {!! Form::select('agency_id', $agencies, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choisissez une agence']) !!}
                        <small class="text-danger">{{ $errors->first('agency_id') }}</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Nom du point de vente', ['class' => 'form-label']) !!}
                        {!! Form::text('name', $salePlace->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="btn-group pull-right">
                        {!! Form::reset('Annuler', ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

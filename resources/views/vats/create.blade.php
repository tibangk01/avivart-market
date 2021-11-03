@extends('layouts.dashboard', ['title' => "TVA"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                {!! Form::open(['method' => 'POST', 'route' => 'vat.store']) !!}

                <div class="form-group">
                    {!! Form::label('percentage', "Pourcentage") !!}
                    {!! Form::number('percentage', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Pourcentage", 'step' => 'any']) !!}
                </div>

                 <div class="form-group text-right">
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
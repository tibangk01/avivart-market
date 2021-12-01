 @extends('layouts.dashboard', ['title' => "Remise"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['method' => 'POST', 'route' => 'discount.store']) !!}

                <div class="form-group">
                    {!! Form::label('amount', "Montant") !!}
                    {!! Form::number('amount', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Montant", 'step' => 'any']) !!}
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
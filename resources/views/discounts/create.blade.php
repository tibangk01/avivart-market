 @extends('layouts.dashboard', ['title' => "Ajouter une remise"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => 'discount.store']) !!}

                <div class="form-group">
                    {!! Form::label('amount', "Montant") !!}
                    {!! Form::number('amount', null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Montant"]) !!}
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
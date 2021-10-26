 @extends('layouts.dashboard', ['title' => "Bons de commande"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($purchase, ['method' => 'PUT', 'route' => ['purchase.update', $purchase]]) !!}

                <div class="form-group">
                    {!! Form::label('provider_id', 'Fournisseur') !!}
                    {!! Form::select('provider_id', $providers, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez un fournisseur']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('vat_id', 'TVA') !!}
                    {!! Form::select('vat_id', $vats, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une TVA']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('discount_id', 'Remise') !!}
                    {!! Form::select('discount_id', $discounts, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une remise']) !!}
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>  
</section>
@endsection
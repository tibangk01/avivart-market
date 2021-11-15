 @extends('layouts.dashboard', ['title' => "Proforma"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($proforma, ['method' => 'PUT', 'route' => ['proforma.update', $proforma]]) !!}

                <div class="form-group">
                    {!! Form::label('customer_id', 'Client') !!}
                    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('vat_id', 'TVA') !!}
                    {!! Form::select('vat_id', $vats, null, ['class' => 'form-control', 'placeholder' => 'Choisissez']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('discount_id', 'Remise') !!}
                    {!! Form::select('discount_id', $discounts, null, ['class' => 'form-control', 'placeholder' => 'Choisissez']) !!}
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
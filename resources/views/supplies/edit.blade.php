 @extends('layouts.dashboard', ['title' => "Approvisionnement"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
                {!! Form::model($supply, ['method' => 'PUT', 'route' => ['supply.update', $supply]]) !!}

                <div class="form-group">
                    {!! Form::label('quantity', 'Quantité') !!}
                    {!! Form::number('quantity', null, ['class' => 'form-control', 'required' => true, 'min' => 1, 'step' => 1]) !!}
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
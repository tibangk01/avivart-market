 @extends('layouts.dashboard', ['title' => "Point de vente & Staff"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">

                {!! Form::open(['method' => 'POST', 'route' => 'sale_place_staff.store']) !!}
                <div class="form-group">
                    {!! Form::label('sale_place_id', "Point de vente") !!}
                    {!! Form::select('sale_place_id', $salePlaces, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('staff_id', "Staff") !!}
                    {!! Form::select('staff_id', $staffs, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group text-right">
                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>  
</section>
@endsection
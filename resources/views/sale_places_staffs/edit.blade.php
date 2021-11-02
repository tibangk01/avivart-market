 @extends('layouts.dashboard', ['title' => "Point de vente & Staff"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                {!! Form::model($salePlaceStaff, ['method' => 'put', 'route' => ['sale_place_staff.update', $salePlaceStaff]]) !!}
                <div class="form-group">
                    {!! Form::label('sale_place_id', "Point de vente") !!}
                    {!! Form::select('sale_place_id', $salePlaces, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez un point de vente"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('staff_id', "Staff") !!}
                    {!! Form::select('staff_id', $staffs, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez un staff"]) !!}
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
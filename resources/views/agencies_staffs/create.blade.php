 @extends('layouts.dashboard', ['title' => "Agence & Staff"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
                {!! Form::open(['method' => 'POST', 'route' => 'agency_staff.store']) !!}
                <div class="form-group">
                    {!! Form::label('agency_id', "Agence") !!}
                    {!! Form::select('agency_id', $agencies, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
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
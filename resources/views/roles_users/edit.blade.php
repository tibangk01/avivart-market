 @extends('layouts.dashboard', ['title' => "Rôle & Utilisateur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                {!! Form::model($roleUser, ['method' => 'put', 'route' => ['role_user.update', $roleUser]]) !!}
                <div class="form-group">
                    {!! Form::label('role_id', "Rôle") !!}
                    {!! Form::select('role_id', $roles, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('user_id', "Utilisateur") !!}
                    {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'required' => true, 'placeholder' => "Choisissez"]) !!}
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
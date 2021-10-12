@extends('layouts.auth', ['title' => 'Mot de passe oublié'] )

@section('body')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Récupération du mot de passe</p>
            
            {!! Form::open(['route' => 'page.login',]) !!}
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control rounded-0 text-sm" placeholder="Entrez votre adresse mail" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group text-right">
                    {!! Form::submit('Demander le lien', ['class' => 'btn btn-sm btn-success rounded-0']) !!}
                </div>
            {!! Form::close() !!}

            <p class="mb-1">
                <a href="{{ route('page.login') }}" class="text-sm">Connexion</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection

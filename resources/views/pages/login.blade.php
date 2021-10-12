@extends('layouts.auth', ['title' => 'Connexion'])

@section('body')
    <div class="card" id="login">

        <div class="bg-purple text-center py-2">{{ config('app.name') }}</div>

        <div class="card-body login-card-body">
            <p class="login-box-msg">Connectez-vous</p>

            {!! Form::open(['route' => 'page.login',]) !!}
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control rounded-0 text-sm" placeholder="Nom d'utilisateur" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control rounded-0 text-sm" placeholder="Mot de passe" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mr-auto">
                        <div class="icheck-primary text-sm">
                            <input type="checkbox" id="remember_me" name="remember_me" checked>
                            <label for="remember_me">
                                Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Se connecter', ['class' => 'btn btn-sm btn-success rounded-0']) !!}
                    </div>
                </div>
            {!! Form::close() !!}

            <p class="mb-1">
                <a href="{{ route('page.forgot_password') }}" class="text-sm">Mot de passe oublié ?</a>
            </p>
        </div>
    </div>
@endsection

@extends('layouts.auth', ['title' => 'Connexion'])

@php($cardHeaderBackColor = [
    'bg-primary',
    'bg-warning',
    'bg-info',
    'bg-danger',
    'bg-success',
    'bg-dark',
    'bg-secondary',
    'bg-indigo',
    'bg-lightblue',
    'bg-navy',
    'bg-purple',
    'bg-fuchsia',
    'bg-pink',
    'bg-maroon',
    'bg-orange',
    'bg-lime',
    'bg-teal',
    'bg-olive'
])

@section('body')
<div class="py-2 text-center">
    <img class="w-100" src="{{ asset('img/logo_bg_transparent.png') }}" alt="{{ config('app.name') }}">
</div>

<div class="card" id="login">
    <div class="{{ $cardHeaderBackColor[mt_rand(0, 17)] }} text-center py-2">{{ config('app.name') }}</div>

    <div class="card-body login-card-body">
        <p class="login-box-msg">Connectez-vous</p>

        {!! Form::open(['route' => 'page.login', 'autocomplete' => 'off']) !!}
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
                        <input type="checkbox" id="remember_me" name="remember_me">
                        <label for="remember_me">Se souvenir de moi</label>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Se connecter', ['class' => 'btn btn-sm btn-success rounded-0']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <div class="text-center py-2">
        <strong>&copy; Copyright 2022, <a href="https://www.avivart.net" target="_blank">AVIV'ART</a>.</strong> Tous Droits Réservés
    </div>
</div>
@endsection
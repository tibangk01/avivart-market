@extends('layouts.auth', ['title' => 'Redéfinition du mot de passe'])

@section('body')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Redéfinissez votre mot de passe</p>
            <form method="post" action="{{ route('page.auth.reset_password') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="password" name="new_password" class="form-control rounded-0 text-sm"
                        placeholder="Nouveau mot de passe" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="confirm_password" class="form-control rounded-0 text-sm"
                        placeholder="Confirmez le mot de passe">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="mr-auto">
                    </div>
                    <div class="mr-1">
                        <button type="reset" class="btn btn-sm btn-primary rounded-0">Annuler</button>
                    </div>
                    <div class="pb-1">
                        <button type="submit" class="btn btn-sm btn-success rounded-0">Valider</button>
                    </div>
                </div>

            </form>

            <p class="mb-1">
                <a href="{{ route('page.auth.login') }}" class="text-sm">Connexion</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection

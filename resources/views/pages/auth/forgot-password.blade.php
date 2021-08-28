@extends('layouts.auth', ['title' => 'Mot de passe oublié'] )

@section('body')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Récupération du mot de passe</p>
            <form method="post" action="{{ route('page.auth.login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control rounded-0 text-sm"
                        placeholder="Entrez votre adresse mail" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
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

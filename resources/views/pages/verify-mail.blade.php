@extends('layouts.auth', ['title' => 'Vérification de mail'])

@section('body')
    <div class="card">
        <div class="card-body login-card-body">
            {{-- <p class="login-box-msg">Information</p> --}}

                <div class="text-center text-sm mb-3">
                    <p class="mt-3">
                        Consultez votre adresse mail.
                    </p>
                    <a class="btn btn-sm btn-success rounded-0" href="{{ route('page.login') }}" class="text-sm">Connexion</a>
                </div>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection

@extends('layouts.dashboard', ['title' => "Détails du fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('show'))
                    @if(request()->query('show') == 'corporation')

                    <div>
                        <x-library :library='$provider->corporation->enterprise->library' class="img200_200" />
                        <a href="{{ route('library.edit', $provider->corporation->enterprise->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-providers.show.corporation :provider="$provider" />

                    @elseif(request()->query('show') == 'person')

                    <div>
                        <x-library :library='$provider->person->user->library' class="img200_200" />
                        <a href="{{ route('library.edit', $provider->person->user->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-providers.show.person :provider="$provider" />

                    @else
                    <p>Erreur de formulaire</p>
                    @endif
                @else
                <p>Erreur interne</p>
                @endif
                
            </div>
        </div>
    </div>
</section>
@endsection
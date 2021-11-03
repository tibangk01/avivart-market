@extends('layouts.dashboard', ['title' => "Fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if($provider->person_type_id == 1)

                    <div>
                        <x-library :library='$provider->corporation->enterprise->library' class="img200_200" />
                        <a href="{{ route('library.edit', $provider->corporation->enterprise->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-providers.show.corporation :provider="$provider" />

                @else

                    <div>
                        <x-library :library='$provider->person->user->library' class="img200_200" />
                        <a href="{{ route('library.edit', $provider->person->user->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-providers.show.person :provider="$provider" />

                @endif
                
            </div>
        </div>
    </div>
</section>
@endsection
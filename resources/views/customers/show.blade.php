@extends('layouts.dashboard', ['title' => "Détails du client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('show'))
                    @if(request()->query('show') == 'corporation')

                    <div>
                        <x-library :library='$customer->corporation->enterprise->library' class="img200_200" />
                        <a href="{{ route('library.edit', $customer->corporation->enterprise->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-customers.show.corporation :customer="$customer" />
                    @elseif(request()->query('show') == 'person')

                    <div>
                        <x-library :library='$customer->person->user->library' class="img200_200" />
                        <a href="{{ route('library.edit', $customer->person->user->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-customers.show.person :customer="$customer" />
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

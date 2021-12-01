@extends('layouts.dashboard', ['title' => ($customer->person_type_id == 1) ? "Client entreprise" : "Client particulier"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if($customer->person_type_id == 1)

                    <div>
                        <x-library :library='$customer->corporation->enterprise->library' class="img200_200" />
                        <a href="{{ route('library.edit', $customer->corporation->enterprise->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-customers.show.corporation :customer="$customer" />

                @else

                    <div>
                        <x-library :library='$customer->person->user->library' class="img200_200" />
                        <a href="{{ route('library.edit', $customer->person->user->library) }}"><i class="fas fa-edit"></i> Editer</a>
                    </div>

                    <x-customers.show.person :customer="$customer" />

                @endif

            </div>
        </div>
    </div>
</section>
@endsection

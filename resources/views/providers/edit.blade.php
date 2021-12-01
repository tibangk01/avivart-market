@extends('layouts.dashboard', ['title' => ($provider->person_type_id == 1) ? "Fournisseur entreprise" : "Fournisseur particulier"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if($provider->person_type_id == 1)

            <div class="row">
                <div class="col-lg-12">
                    <x-providers.edit.corporation :provider="$provider" />
                </div>
            </div>

        @else

            <div class="row">
                <div class="col-lg-12">
                    <x-providers.edit.person :provider="$provider" />
                </div>
            </div>
        
        @endif

    </div>
</section>
@endsection
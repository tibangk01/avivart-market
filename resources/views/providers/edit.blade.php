@extends('layouts.dashboard', ['title' => "Fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if($provider->person_type_id == 1)

            <div class="row">
                <div class="col-lg-12">
                    <h2>Fournisseur Entreprise</h2>
                
                    <x-providers.edit.corporation :provider="$provider" />
                </div>
            </div>

        @else

            <div class="row">
                <div class="col-lg-12">
                    <h2>Fournisseur Particlier</h2>
                
                    <x-providers.edit.person :provider="$provider" />
                </div>
            </div>
        
        @endif

    </div>
</section>
@endsection
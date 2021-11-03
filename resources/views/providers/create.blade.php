@extends('layouts.dashboard', ['title' => "Fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if(request()->has('create'))
            @if(request()->query('create') == 'corporation')

            <div class="row">
                <div class="col-lg-6">
                    <h2>Fournisseur Entreprise</h2>
                </div>
                <div class="col-lg-6">
                    <x-providers.create.corporation />
                </div>
            </div>

            @elseif(request()->query('create') == 'person')

            <div class="row">
                <div class="col-lg-6">
                    <h2>Fournisseur Particlier</h2>
                </div>
                <div class="col-lg-6">
                    <x-providers.create.person />
                </div>
            </div>

            @else
            
            <div class="row">
                <div class="col-lg-12">
                    <p>Erreur interne</p>
                </div>
            </div>

            @endif
        @else

        <div class="row">
            <div class="col-lg-12">
                <p>Erreur interne</p>
            </div>
        </div>
        
        @endif

    </div>
</section>
@endsection
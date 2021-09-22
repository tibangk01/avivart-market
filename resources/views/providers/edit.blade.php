@extends('layouts.dashboard', ['title' => "Editer le fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if(request()->has('edit'))
            @if(request()->query('edit') == 'corporation')

            <div class="row">
                <div class="col-lg-6">
                    <h2>Fournisseur Entreprise</h2>
                </div>
                <div class="col-lg-6">
                    <x-providers.edit.corporation :provider="$provider" />
                </div>
            </div>

            @elseif(request()->query('edit') == 'person')

            <div class="row">
                <div class="col-lg-6">
                    <h2>Fournisseur Particlier</h2>
                </div>
                <div class="col-lg-6">
                    <x-providers.edit.person :provider="$provider" />
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
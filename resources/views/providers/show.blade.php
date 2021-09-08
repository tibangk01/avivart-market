@extends('layouts.dashboard', ['title' => "Détails du fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('show'))
                    @if(request()->query('show') == 'corporation')
                    <x-providers.show.corporation :provider="$provider" />
                    @elseif(request()->query('show') == 'person')
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
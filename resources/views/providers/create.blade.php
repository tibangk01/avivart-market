@extends('layouts.dashboard', ['title' =>  (request()->query('create') == 'corporation') ? "Fournisseur entreprise" : "Fournisseur particulier"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if(request()->query('create') == 'corporation')

        <div class="row">
            <div class="col-lg-12">
                <x-providers.create.corporation />
            </div>
        </div>

        @elseif(request()->query('create') == 'person')

        <div class="row">
            <div class="col-lg-12">
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

    </div>
</section>
@endsection
@extends('layouts.dashboard', ['title' => "Ajouter un fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('create'))
                    @if(request()->query('create') == 'corporation')
                    <x-providers.create.corporation />
                    @elseif(request()->query('create') == 'person')
                    <x-providers.create.person />
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
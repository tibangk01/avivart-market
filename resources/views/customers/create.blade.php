@extends('layouts.dashboard', ['title' => "Ajouter un client"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if(request()->has('create'))
            @if(request()->query('create') == 'corporation')

            <div class="row">
                <div class="col-lg-6">
                    <h2>Client Entreprise</h2>
                </div>
                <div class="col-lg-6">
                    <x-customers.create.corporation />
                </div>
            </div>

            @elseif(request()->query('create') == 'person')

            <div class="row">
                <div class="col-lg-6">
                    <h2>Client Particlier</h2>
                </div>
                <div class="col-lg-6">
                    <x-customers.create.person />
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
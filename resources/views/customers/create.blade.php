@extends('layouts.dashboard', ['title' => "Ajouter un client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('create'))
                    @if(request()->query('create') == 'corporation')
                    <x-customers.create.corporation />
                    @elseif(request()->query('create') == 'person')
                    <x-customers.create.person />
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
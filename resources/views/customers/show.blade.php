@extends('layouts.dashboard', ['title' => "Détails du client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('show'))
                    @if(request()->query('show') == 'corporation')
                    <x-customers.show.corporation :customer="$customer" />
                    @elseif(request()->query('show') == 'person')
                    <x-customers.show.person :customer="$customer" />
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
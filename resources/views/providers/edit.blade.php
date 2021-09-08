@extends('layouts.dashboard', ['title' => "Editer le fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('edit'))
                    @if(request()->query('edit') == 'corporation')
                    <x-providers.edit.corporation :provider="$provider" />
                    @elseif(request()->query('edit') == 'person')
                    <x-providers.edit.person :provider="$provider" />
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
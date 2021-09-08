@extends('layouts.dashboard', ['title' => "Editer le client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(request()->has('edit'))
                    @if(request()->query('edit') == 'corporation')
                    <x-customers.edit.corporation :customer="$customer" />
                    @elseif(request()->query('edit') == 'person')
                    <x-customers.edit.person :customer="$customer" />
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
@extends('layouts.dashboard', ['title' => "Editer le client"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if($customer->person_type_id == 1)

            <div class="row">
                <div class="col-lg-6">
                    <h2>Client Entreprise</h2>
                </div>
                <div class="col-lg-6">
                    <x-customers.edit.corporation :customer="$customer" />
                </div>
            </div>

        @else

            <div class="row">
                <div class="col-lg-6">
                    <h2>Client Particlier</h2>
                </div>
                <div class="col-lg-6">
                    <x-customers.edit.person :customer="$customer" />
                </div>
            </div>

        @endif

    </div>
</section>
@endsection
@extends('layouts.dashboard', ['title' => "Client"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if($customer->person_type_id == 1)

            <div class="row">
                <div class="col-lg-12">
                    <h2>Client Entreprise</h2>
                
                    <x-customers.edit.corporation :customer="$customer" />
                </div>
            </div>

        @else

            <div class="row">
                <div class="col-lg-12">
                    <h2>Client Particlier</h2>
                
                    <x-customers.edit.person :customer="$customer" />
                </div>
            </div>

        @endif

    </div>
</section>
@endsection
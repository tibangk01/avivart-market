@extends('layouts.dashboard', ['title' => ($customer->person_type_id == 1) ? "Client entreprise" : "Client particulier"])

@section('body')
<section class="content">
    <div class="container-fluid">

        @if($customer->person_type_id == 1)

            <div class="row">
                <div class="col-lg-12">
                    <x-customers.edit.corporation :customer="$customer" />
                </div>
            </div>

        @else

            <div class="row">
                <div class="col-lg-12">
                    <x-customers.edit.person :customer="$customer" />
                </div>
            </div>

        @endif

    </div>
</section>
@endsection
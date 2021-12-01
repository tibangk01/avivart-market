@extends('layouts.dashboard', ['title' => "Payement fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <livewire:purchase-payment />

            </div>
        </div>
    </div>
</section>
@endsection
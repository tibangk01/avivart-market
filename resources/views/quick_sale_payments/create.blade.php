@extends('layouts.dashboard', ['title' => "Payement vente rapide"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Text</h4>
            </div>
            <div class="col-lg-6">
                <livewire:quick-sale-payment />
            </div>
        </div>
    </div>
</section>
@endsection
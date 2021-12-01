@extends('layouts.dashboard', ['title' => "Payement vente rapide"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <livewire:quick-sale-payment />
            </div>
        </div>
    </div>
</section>
@endsection
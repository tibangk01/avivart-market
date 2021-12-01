@extends('layouts.dashboard', ['title' => "Payement client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <livewire:order-payment />
            </div>
        </div>
    </div>
</section>
@endsection
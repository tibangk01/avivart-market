 @extends('layouts.dashboard', ['title' => "Enregistrement d'un bon de commande"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h6>Liste des produits</h6>

                @livewire('purchases.products')
            </div>
            <div class="col-lg-6">
                <h6>Panier de produits</h6>

                @livewire('purchases.cart')
            </div>
        </div>
    </div>  
</section>
@endsection
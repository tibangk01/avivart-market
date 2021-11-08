 @extends('layouts.dashboard', ['title' => "Commande fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h6>Liste des produits</h6>

                <livewire:product-list instance="purchase" />
            </div>
            <div class="col-lg-6">
                <h6>Panier de produits</h6>

                <livewire:cart-list instance="purchase" />
            </div>
        </div>
    </div>  
</section>
@endsection
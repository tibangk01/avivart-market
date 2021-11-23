 @extends('layouts.dashboard', ['title' => "Commande fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Liste de produits</h4>

                <livewire:product-list instance="purchase" />
            </div>
            <div class="col-lg-6">
                <h4>Panier de produits</h4>

                <livewire:cart-list instance="purchase" />
            </div>
        </div>
    </div>  
</section>
@endsection
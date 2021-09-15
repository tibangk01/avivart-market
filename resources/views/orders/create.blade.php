 @extends('layouts.dashboard', ['title' => "Enregistrement d'une commande"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h6>Liste des produits</h6>

                <x-products instance="order" />
            </div>
            <div class="col-lg-6">
                <h6>Panier de produits</h6>
                
                <x-cart instance="order" />
            </div>
        </div>
    </div>  
</section>
@endsection
 @extends('layouts.dashboard', ['title' => "Enregistrement d'un proforma"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h6>Liste des produits</h6>

                <x-products instance="proforma" />
            </div>
            <div class="col-lg-6">
                <h6>Panier de produits</h6>
                
                <x-cart instance="proforma" />
            </div>
        </div>
    </div>  
</section>
@endsection
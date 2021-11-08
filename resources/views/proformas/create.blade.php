 @extends('layouts.dashboard', ['title' => "Proforma"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h6>Liste des produits</h6>

                <livewire:product-list instance="proforma" />
            </div>
            <div class="col-lg-6">
                <h6>Panier de produits</h6>
                
                <livewire:cart-list instance="proforma" />
            </div>
        </div>
    </div>  
</section>
@endsection
 @extends('layouts.dashboard', ['title' => "Proforma"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>Liste de produits</h4>

                <livewire:product-list instance="proforma" />
            </div>
            <div class="col-lg-6">
                <h4>Panier de produits</h4>
                
                <livewire:cart-list instance="proforma" />
            </div>
        </div>
    </div>  
</section>
@endsection
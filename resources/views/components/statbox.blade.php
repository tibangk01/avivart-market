<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $productsCount + $servicesCount }}</h3>
                <p>Produits & Services (Produits : {{ $productsCount }}, Services : {{ $servicesCount }})</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('product.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $quickSalesPaidCount + $quickSalesUnpaidCount }}</h3>
                <p>Ventes rapide (Payées : {{ $quickSalesPaidCount }}, Impayées : {{ $quickSalesUnpaidCount }})</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('quick_sale.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $purchasesPaidCount + $purchasesUnpaidCount }}</h3>
                <p>Commandes fournisseur (Payées : {{ $purchasesPaidCount }}, Impayées : {{ $purchasesUnpaidCount }})</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('purchase.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $ordersPaidCount + $ordersUnpaidCount }}</h3>
                <p>Commandes client (Payées : {{ $ordersPaidCount }}, Impayées : {{ $ordersUnpaidCount }})</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('order.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
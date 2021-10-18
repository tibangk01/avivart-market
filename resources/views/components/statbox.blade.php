<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
        <h3>{{ $agenciesCount }}</h3>

        <p>Agences</p>
        </div>
        <div class="icon">
        <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('agency.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
        <h3>{{ $salePlacesCount }}</h3>

        <p>Points de vente</p>
        </div>
        <div class="icon">
        <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('sale_place.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
        <h3>{{ $purchasesCount }}</h3>

        <p>Bons de commande</p>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('purchase.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
        <h3>{{ $ordersCount }}</h3>

        <p>Factures</p>
        </div>
        <div class="icon">
        <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{ route('order.index') }}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
</div>
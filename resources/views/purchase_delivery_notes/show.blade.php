 @extends('layouts.dashboard', ['title' => "Réception fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <x-library :library='$purchaseDeliveryNote->library' class="img200_200" />
                <a href="{{ route('library.edit', $purchaseDeliveryNote->library) }}"><i class="fas fa-edit"></i> Editer</a>
            </div>

            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clé</th>
                                <th>Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Numéro</th>
                                <td>{{ $purchaseDeliveryNote->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Commande fournisseur</th>
                                <td>{{ $purchaseDeliveryNote->purchase->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $purchaseDeliveryNote->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $purchaseDeliveryNote->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h4>Ligne de commande fournisseur</h4>

                <div class="text-right py-1">
                    @can('cudProductPurchase', $purchase)
                    <x-create-record routeName="product_purchase.create" />
                    @endcan
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>PAG</th>
                                <th>PAU</th>
                                <th>Qté Comdée</th>
                                <th>Qté Livrée</th>
                                <th>PAHT</th>
                                <th>DC</th>
                                <th>DM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchaseDeliveryNote->purchase->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->global_purchase_price }}</td>
                                    <td>{{ $product->pivot->purchase_price }}</td>
                                    <td>{{ $product->pivot->ordered_quantity }}</td>
                                    <td>{{ $product->pivot->delivered_quantity }}</td>
                                    <td>{{ $product->pivot->purchase_price * $product->pivot->ordered_quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                        <x-show-record routeName="product_purchase.show" :routeParam="$product->pivot->id" />

                                        @can('cudProductPurchase', $purchase)
                                        <x-edit-record routeName="product_purchase.edit" :routeParam="$product->pivot->id" />

                                        <x-destroy-record routeName="product_purchase.destroy" :routeParam="$product->pivot->id" />
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="9">Pas d'enregistrements</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection
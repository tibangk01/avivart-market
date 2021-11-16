@extends('layouts.dashboard', ['title' => "Commande fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clé</th>
                                <th>Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="{{ $purchase->getBgColor() }}">
                                <th>Statut</th>
                                <td>{{ $purchase->getPaid() }}</td>
                            </tr>
                            <tr>
                                <th>Numéro</th>
                                <td>{{ $purchase->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Fournisseur</th>
                                <td>{{ $purchase->provider->getName() }}</td>
                            </tr>
                            <tr>
                                <th>TVA</th>
                                <td>{{ $purchase->getVat() }}</td>
                            </tr>
                            <tr>
                                <th>Remise</th>
                                <td>{{ $purchase->getDiscount() }}</td>
                            </tr>
                            <tr>
                                <th>Total HT</th>
                                <td>{{ $purchase->totalHT() }}</td>
                            </tr>
                            <tr>
                                <th>Total TVA</th>
                                <td>{{ $purchase->totalTVA() }}</td>
                            </tr>
                            <tr>
                                <th>Total TTC</th>
                                <td>{{ $purchase->totalTTC() }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $purchase->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $purchase->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-right py-1">
                    <x-create-record routeName="product_purchase.create" />
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>Qté Comdée</th>
                                <th>Qté Livrée</th>
                                <th>DC</th>
                                <th>DM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchase->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->ordered_quantity }}</td>
                                    <td>{{ $product->pivot->delivered_quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                        <x-show-record routeName="product_purchase.show" :routeParam="$product->pivot->id" />

                                        @if(!$purchase->paid)
                                        <x-edit-record routeName="product_purchase.edit" :routeParam="$product->pivot->id" />

                                        <x-destroy-record routeName="product_purchase.destroy" :routeParam="$product->pivot->id" />
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6">Pas d'enregistrements</td>
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
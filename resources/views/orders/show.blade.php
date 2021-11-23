 @extends('layouts.dashboard', ['title' => "Commande client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
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
                                <th>Statut</th>
                                <td>{{ $order->getPaid() }}</td>
                            </tr>
                            <tr>
                                <th>Fichier</th>
                                <td>{{ $order->hasDeliveryNote() }}</td>
                            </tr>
                            <tr>
                                <th>Numéro</th>
                                <td>{{ $order->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Client</th>
                                <td>{{ $order->customer->getName() }}</td>
                            </tr>
                            <tr>
                                <th>Etat</th>
                                <td>{{ $order->order_state->name }}</td>
                            </tr>
                            <tr>
                                <th>TVA</th>
                                <td>{{ $order->getVat() }}</td>
                            </tr>
                            <tr>
                                <th>Remise</th>
                                <td>{{ $order->getDiscount() }}</td>
                            </tr>
                            <tr>
                                <th>Total HT</th>
                                <td>{{ $order->totalHT() }}</td>
                            </tr>
                            <tr>
                                <th>Total TVA</th>
                                <td>{{ $order->totalTVA() }}</td>
                            </tr>
                            <tr>
                                <th>Total TTC</th>
                                <td>{{ $order->totalTTC() }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $order->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h4>Ligne de commande client</h4>

                <div class="text-right py-1">
                    <x-create-record routeName="product_order.create" />
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>PVG</th>
                                <th>PVU</th>
                                <th>Qté</th>
                                <th>PVHT</th>
                                <th>DC</th>
                                <th>DM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->global_selling_price }}</td>
                                    <td>{{ $product->pivot->selling_price }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->selling_price * $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                        <x-show-record routeName="product_order.show" :routeParam="$product->pivot->id" />

                                        @if(!$order->paid)
                                        <x-edit-record routeName="product_order.edit" :routeParam="$product->pivot->id" />

                                        <x-destroy-record routeName="product_order.destroy" :routeParam="$product->pivot->id" />
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8">Pas d'enregistrements</td>
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
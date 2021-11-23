 @extends('layouts.dashboard', ['title' => "Livraison client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <x-library :library='$orderDeliveryNote->library' class="img200_200" />
                <a href="{{ route('library.edit', $orderDeliveryNote->library) }}"><i class="fas fa-edit"></i> Editer</a>
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
                                <td>{{ $orderDeliveryNote->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Commande client</th>
                                <td>{{ $orderDeliveryNote->order->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $orderDeliveryNote->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $orderDeliveryNote->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h4>Ligne de commande client</h4>

                <div class="text-right py-1">
                    @can('cudProductOrder', $order)
                    <x-create-record routeName="product_order.create" />
                    @endcan
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
                            @forelse ($orderDeliveryNote->order->products as $product)
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

                                        @can('cudProductOrder', $order)
                                        <x-edit-record routeName="product_order.edit" :routeParam="$product->pivot->id" />

                                        <x-destroy-record routeName="product_order.destroy" :routeParam="$product->pivot->id" />
                                        @endcan
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
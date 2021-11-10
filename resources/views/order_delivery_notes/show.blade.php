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
                <div class="table-responsive bg-white">
                    <table class="table table-bordered table-striped table-hover mb-0">
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-nowrap datatable text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>Qté</th>
                                <th>DC</th>
                                <th>DM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orderDeliveryNote->order->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs"
                                            href="{{ route('product_order.show', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('product_order.destroy', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">Pas d'enregistrements</td>
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
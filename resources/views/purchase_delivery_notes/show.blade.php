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
                                <td>{{ $purchaseDeliveryNote->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Bon de commande</th>
                                <td>{{ $purchaseDeliveryNote->purchase->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $purchaseDeliveryNote->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $purchaseDeliveryNote->updated_at }}</td>
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
                                <th>Qté Comdée</th>
                                <th>Qté Livrée</th>
                                <th>DC</th>
                                <th>DJ</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchaseDeliveryNote->purchase->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->ordered_quantity }}</td>
                                    <td>{{ $product->pivot->delivered_quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs"
                                            href="{{ route('product_purchase.show', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('product_purchase.destroy', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>
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
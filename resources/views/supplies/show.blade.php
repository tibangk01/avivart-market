 @extends('layouts.dashboard', ['title' => "Détails de l'approvisionnement"])

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
                            <tr>
                                <th>Numéro</th>
                                <td>{{ $supply->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Bon de commande</th>
                                <td>{{ $supply->product_purchase->purchase->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Produit</th>
                                <td>{{ $supply->product_purchase->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Quantité</th>
                                <td>{{ $supply->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $supply->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $supply->updated_at }}</td>
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
                            @forelse ($supply->product_purchase->purchase->products as $product)
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
                                        <a class="btn btn-warning btn-xs"
                                            href="{{ route('product_purchase.edit', $product->pivot->id) }}"
                                            title="Editer"><i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('product_purchase.destroy', $product->pivot->id) }}"
                                            title="Supprimer"><i class="fa fa-trash"
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
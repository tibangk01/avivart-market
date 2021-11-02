@extends('layouts.dashboard', ['title' => "Bon de commande et sa liste de produits"])

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
                                <th>Payement</th>
                                <td>{{ $purchase->paid ? 'Oui' : 'Non' }}</td>
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
                                <td>{{ $purchase->vat->percentage }}</td>
                            </tr>
                            <tr>
                                <th>Remise</th>
                                <td>{{ $purchase->discount->amount }}</td>
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
                                <th>Date de création</th>
                                <td>{{ $purchase->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $purchase->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-right py-1">
                    <a class="btn btn-flat btn-primary" href="{{ route('product_purchase.create') }}">
                        <i class="fa fa-plus"></i> Ajouter
                    </a>
                </div>
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
                            @forelse ($purchase->products as $product)
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

                                        @if(!$purchase->paid)
                                        <a class="btn btn-warning btn-xs"
                                            href="{{ route('product_purchase.edit', $product->pivot->id) }}"
                                            title="Editer"><i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('product_purchase.destroy', $product->pivot->id) }}"
                                            title="Supprimer"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>
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
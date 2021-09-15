@extends('layouts.pdf', ['title' => "Bon de commande"])

@section('body')
<table class="table table1">
    <thead class="thead-dark">
        <tr>
            <th>Clé</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
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
            <th>Date de création</th>
            <td>{{ $purchase->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
            <th>Date de mise à jour</th>
            <td>{{ $purchase->updated_at->diffForHumans() }}</td>
        </tr>
    </tbody>
</table>

<h4>Liste des produits</h4>

<table class="table table2">
    <thead class="thead-dark">
        <tr>
            <th>Produit</th>
            <th>Qté Comdée</th>
            <th>Qté Livrée</th>
            <th>DC</th>
            <th>DJ</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($purchase->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->ordered_quantity }}</td>
                <td>{{ $product->pivot->delivered_quantity }}</td>
                <td>{{ $product->pivot->created_at->diffForHumans() }}</td>
                <td>{{ $product->pivot->updated_at->diffForHumans() }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="5">
                Pas d'enregistrements.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
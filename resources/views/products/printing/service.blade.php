@extends('layouts.pdf', ['title' => $product->name, 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark"><u>{{ $product->name }}</u></h4>

<p class="my-2">
<x-library :library='$product->library' class="img200_200" />
</p>

<table class="table table-bordered table-stripped table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Clé</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Nom</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Fournisseur</th>
            <td>{{ $product->provider->getName() }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $product->product_type->name }}</td>
        </tr>
        <tr>
            <th>Catégorie</th>
            <td>{{ $product->product_category->name }}</td>
        </tr>
        <tr>
            <th>Unité</th>
            <td>{{ $product->conversion->name }}</td>
        </tr>
        <tr>
            <th>Prix de Vente Unitaire</th>
            <td>{{ $product->selling_price }}</td>
        </tr>
        <tr>
            <th>Quantité en Stock</th>
            <td>{{ $product->stock_quantity }}</td>
        </tr>
        <tr>
            <th>Date de Création</th>
            <td>{{ $product->created_at }}</td>
        </tr>
        <tr>
            <th>Date de Modification</th>
            <td>{{ $product->updated_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
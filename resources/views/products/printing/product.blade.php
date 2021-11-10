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
            <th>Description</th>
            <td>{{ $product->description }}</td>
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
            <th>Prix d'Achat Unitaire</th>
            <td>{{ $product->purchase_price }}</td>
        </tr>
        <tr>
            <th>Prix de Vente Unitaire</th>
            <td>{{ $product->selling_price }}</td>
        </tr>
        <tr>
            <th>Prix de Location Unitaire</th>
            <td>{{ $product->rental_price }}</td>
        </tr>
        <tr>
            <th>Quantité en stock</th>
            <td>{{ $product->stock_quantity }}</td>
        </tr>
        <tr>
            <th>Quantité Vendue</th>
            <td>{{ $product->sold_quantity }}</td>
        </tr>
        <tr>
            <th>Quantité d'Alert</th>
            <td>{{ $product->alert_quantity }}</td>
        </tr>
        <tr>
            <th>Numéro de série</th>
            <td>{{ $product->serial_number }}</td>
        </tr>
        <tr>
            <th>Date de fabrication</th>
            <td>{{ $product->manufacture_date }}</td>
        </tr>
        <tr>
            <th>Date d'expiration</th>
            <td>{{ $product->expiration_date }}</td>
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
@extends('layouts.pdf', ['title' => "Liste des produits", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark"><u>LISTE DES PRODUITS</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Unité</th>
            <th>PAU</th>
            <th>PVU</th>
            <th>PLU</th>
            <th>Qté en Stock</th>
            <th>Qté Vendue</th>
            <th>Date de Création</th>
            <th>Date de Modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->product_type->name }}</td>
            <td>{{ $product->conversion->name }}</td>
            <td>{{ $product->purchase_price }}</td>
            <td>{{ $product->selling_price }}</td>
            <td>{{ $product->rental_price }}</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>{{ $product->sold_quantity }}</td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="10">Pas d'enregistrements.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
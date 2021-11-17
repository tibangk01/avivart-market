@extends('layouts.pdf', ['title' => "Liste des services", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Liste des services</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Unité</th>
            <th>PVU</th>
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
            <td>{{ $product->selling_price }}</td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Pas d'enregistrements.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
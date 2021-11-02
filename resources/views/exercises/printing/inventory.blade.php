@extends('layouts.pdf', ['title' => "Inventaire", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<table class="table table-bordered table-sm">
    <tr>
        <th colspan="2">{{ $exercise->title }}</th>
    </tr>
    <tr>
        <th>Période : {{ $exercise->getPeriod() }}</th>
        <th>Date : {{ $exercise->created_at }}</th>
    </tr>
</table>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Produit</th>
            <th>Type</th>
            <th>Catégorie</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($exercise->products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->product_type->name }}</td>
            <td>{{ $product->product_category->name }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3">Pas d'enregistrements.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
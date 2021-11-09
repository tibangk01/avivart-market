@extends('layouts.pdf', ['title' => "Inventaire", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')

<h4 class="text-center text-dark text-uppercase"><u>{{ $exercise->title }}</u></h4>

<table class="table table-bordered table-sm">
    <tr>
        <th>Période : {{ $exercise->getPeriod() }}</th>
        <th>Date : {{ $exercise->created_at->format('d/m/Y H:i:s') }}</th>
    </tr>
</table>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>Produits</th>
            <th>Type</th>
            <th>SI</th>
            <th>Entrées</th>
            <th>SF</th>
            <th>Perte</th>
            <th>Ventes</th>
            <th>PAU</th>
            <th>PVU</th>
            <th>MU</th>
            <th>MG</th>
            <th>TV</th>
            <th>CA</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($exercise->products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->product_type->name }}</td>
            <td>{{ $product->pivot->initial_stock }}</td>
            <td>0</td>
            <td>{{ $product->pivot->final_stock }}</td>
            <td>{{ $product->pivot->loss }}</td>
            <td>0</td>
            <td>{{ $product->pivot->purchase_price }}</td>
            <td>{{ $product->pivot->selling_price }}</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        @empty
        <tr>
            <td colspan="13">Pas d'enregistrements.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<h6 class="text-danger"><u>Légende :</u></h6>
<ul class="">
    <li>SI : Stock Initial</li>
    <li>SF : Stock Final</li>
    <li>PAV : Prix d'Achat Unitaire</li>
    <li>PVU : Prix de Vente Unitaire</li>
    <li>MU : Marge Unitaire</li>
    <li>MG : Marge Globale</li>
    <li>TV : Total Ventes</li>
    <li>CA : Chiffre d'Affaires</li>
</ul>
@endsection
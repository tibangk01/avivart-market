@extends('layouts.pdf', ['title' => 'Reçu de vente', 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Reçu de vente</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    
</div>

<p class="text-right">Fait à {{ session('sessionSociety')->enterprise->city }} le {{ $quickSale->created_at->format('d M Y') }}</p>

<h6 class="text-uppercase">REF : {{ $quickSale->getNumber() }} | {{ session('sessionSociety')->enterprise->city }}-{{ session('sessionSociety')->enterprise->country->name }}, Date : {{ $quickSale->created_at->format('d/m/Y') }}.</h6>

<table class="table table-bordered table-stripped table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Clé</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Produit</td>
            <td>{{ $quickSale->product->name }}</td>
        </tr>
        <tr>
            <td>TVA</td>
            <td>{{ $quickSale->getVat() }}</td>
        </tr>
        <tr>
            <td>Remise</td>
            <td>{{ $quickSale->getDiscount() }}</td>
        </tr>
        <tr>
            <td>Quantité</td>
            <td>{{ $quickSale->quantity }}</td>
        </tr>
        <tr>
            <td>PVU</td>
            <td>{{ $quickSale->selling_price }}</td>
        </tr>
        <tr>
            <td>Total HT</td>
            <td>{{ $quickSale->totalHT() }}</td>
        </tr>
        <tr>
            <td>Total TVA</td>
            <td>{{ $quickSale->totalTVA() }}</td>
        </tr>
        <tr>
            <td>Total TTC</td>
            <td>{{ $quickSale->totalTTC() }}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td>{{ $quickSale->created_at }}</td>
        </tr>
    </tbody>
</table>

<p class="text-dark">Arrêté le présent reçu à la somme de {{ numberTransformer($quickSale->totalTTC()) }}</p>

<x-signature />

<p><em>Merci pour la confiance !</em></p>
@endsection
@extends('layouts.pdf', ['title' => 'Reçu de payement vente rapide', 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Reçu de payement vente rapide</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    
</div>

<p class="text-right">Fait à {{ session('sessionSociety')->enterprise->city }} le {{ $quickSalePayment->created_at->isoFormat('LL') }}</p>

<h6 class="text-uppercase">REF : {{ $quickSalePayment->quick_sale->getNumber() }} | {{ session('sessionSociety')->enterprise->city }}-{{ session('sessionSociety')->enterprise->country->name }}, Date : {{ $quickSalePayment->created_at->isoFormat('L') }}.</h6>

<table class="table table-bordered table-stripped table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Clé</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Produit</th>
            <td>{{ $quickSalePayment->quick_sale->product->name }}</td>
        </tr>
        <tr>
            <th>TVA</th>
            <td>{{ $quickSalePayment->quick_sale->getVat() }}</td>
        </tr>
        <tr>
            <th>Remise</th>
            <td>{{ $quickSalePayment->quick_sale->getDiscount() }}</td>
        </tr>
        <tr>
            <th>Quantité</th>
            <td>{{ $quickSalePayment->quick_sale->quantity }}</td>
        </tr>
        <tr>
            <th>PVU</th>
            <td>{{ $quickSalePayment->quick_sale->selling_price }}</td>
        </tr>
        <tr>
            <th>Total HT</th>
            <td>{{ $quickSalePayment->quick_sale->totalHT() }}</td>
        </tr>
        <tr>
            <th>Total TVA</th>
            <td>{{ $quickSalePayment->quick_sale->totalTVA() }}</td>
        </tr>
        <tr>
            <th>Total TTC</th>
            <td>{{ $quickSalePayment->quick_sale->totalTTC() }}</td>
        </tr>
        <tr>
            <th>Montant Payé</th>
            <td>{{ $quickSalePayment->payment->amount }}</td>
        </tr>
        <tr>
            <th>Total Payé</th>
            <td>{{ $quickSalePayment->totalPayment($quickSalePayment->quick_sale) }}</td>
        </tr>
        <tr>
            <th>Reste a Payer</th>
            <td>{{ $quickSalePayment->remnantPayment($quickSalePayment->quick_sale) }}</td>
        </tr>
        <tr>
            <th>Date de Création</th>
            <td>{{ $quickSalePayment->quick_sale->created_at }}</td>
        </tr>
    </tbody>
</table>

<p class="text-dark">Arrêté le présent reçu à la somme de {{ numberTransformer($quickSalePayment->payment->amount) }}</p>

<x-signature />

<p><em>Merci pour la confiance !</em></p>
@endsection
@extends('layouts.pdf', ['title' => "Reçu de payement fournisseur", 'watermark' => true, 'orientation' => 'portrait'])

@php($increment = 0)

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Reçu de payement fournisseur</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    <h4 class="m-0 text-primary">{{ $purchasePayment->purchase->provider->getName() }}</h4>
    <p class="m-0 fs-12">Tél : {{ $purchasePayment->purchase->provider->getFullPhoneNumber() }}</p>
</div>

<p class="text-right">Fait à {{ session('sessionSociety')->enterprise->city }} le {{ $purchasePayment->created_at->isoFormat('LL') }}</p>

<h6 class="text-uppercase">REF : {{ $purchasePayment->purchase->getNumber() }} | {{ session('sessionSociety')->enterprise->city }}-{{ session('sessionSociety')->enterprise->country->name }}, Date : {{ $purchasePayment->created_at->isoFormat('L') }}.</h6>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>N°</th>
            <th>Désignation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Qté</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($purchasePayment->purchase->products as $product)
            <tr>
                <td>{{ ++$increment }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->mark }}</td>
                <td>{{ $product->ref }}</td>
                <td>{{ $product->pivot->ordered_quantity }}</td>
                <td>{{ $product->pivot->comment }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="6">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr class="table-info">
            <th colspan="3">TVA</th>
            <td colspan="3">{{ $purchasePayment->purchase->getVat() }}</td>
        </tr>
        <tr>
            <th colspan="3">Remise</th>
            <td colspan="3">{{ $purchasePayment->purchase->getDiscount() }}</td>
        </tr>
        <tr class="table-success">
            <th colspan="3">Total HT</th>
            <td colspan="3">{{ $purchasePayment->purchase->totalHT() }}</td>
        </tr>
        <tr>
            <th colspan="3">Total TVA</th>
            <td colspan="3">{{ $purchasePayment->purchase->totalTVA() }}</td>
        </tr>
        <tr class="table-warning">
            <th colspan="3">Total TTC</th>
            <td colspan="3">{{ $purchasePayment->purchase->totalTTC() }}</td>
        </tr>
        <tr class="">
            <th colspan="3">Montant Payé</th>
            <td colspan="3">{{ $purchasePayment->payment->amount }}</td>
        </tr>
        <tr class="">
            <th colspan="3">Total Payé</th>
            <td colspan="3">{{ $purchasePayment->totalPayment($purchasePayment->purchase) }}</td>
        </tr>
        <tr class="">
            <th colspan="3">Reste a Payer</th>
            <td colspan="3">{{ $purchasePayment->remnantPayment($purchasePayment->purchase) }}</td>
        </tr>
    </tfoot>
</table>

<p class="text-dark">Arrêté le présent reçu à la somme de {{ numberTransformer($purchasePayment->payment->amount) }}</p>

<x-signature />

<p><em></em></p>
@endsection
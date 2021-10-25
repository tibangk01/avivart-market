@extends('layouts.pdf', ['title' => "Facture", 'watermark' => true, 'orientation' => 'portrait'])

@php($increment = 0)

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Facture</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    <p class="m-0">
        <x-library :library='$orderPayment->order->customer->getLibrary()' class="img100_100" />
    </p>
    <h4 class="m-0 text-primary">{{ $orderPayment->order->customer->getName() }}</h4>
    <p class="m-0 fs-12">Tél : {{ $orderPayment->order->customer->getFullPhoneNumber() }}</p>
</div>

<h6 class="text-uppercase">REF : {{ $orderPayment->order->getNumber() }}, Date : {{ $orderPayment->order->created_at->format('d/m/Y') }}.</h6>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>N°</th>
            <th>Désignation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Unité</th>
            <th>PU HT</th>
            <th>PT HT</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orderPayment->order->products as $product)
            <tr>
                <td>{{ ++$increment }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->mark }}</td>
                <td>{{ $product->ref }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->selling_price * $product->pivot->quantity }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="7">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr class="table-info">
            <th colspan="4">TVA</th>
            <td colspan="3">{{ $orderPayment->order->vat->percentage }}</td>
        </tr>
        <tr>
            <th colspan="4">Remise</th>
            <td colspan="3">{{ $orderPayment->order->discount->amount }}</td>
        </tr>
        <tr class="table-success">
            <th colspan="4">Total HT</th>
            <td colspan="3">{{ $orderPayment->order->totalHT() }}</td>
        </tr>
        <tr>
            <th colspan="4">Total TVA</th>
            <td colspan="3">{{ $orderPayment->order->totalTVA() }}</td>
        </tr>
        <tr class="table-warning">
            <th colspan="4">Total TTC</th>
            <td colspan="3">{{ $orderPayment->order->totalTTC() }}</td>
        </tr>
    </tfoot>
</table>

<p class="text-dark">Arrêté la présente facture à la somme de {{ numberTransformer($orderPayment->order->totalTTC()) }}</p>

<x-signature />

<p><em>Merci pour la confiance !</em></p>
@endsection
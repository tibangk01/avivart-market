@extends('layouts.pdf', ['title' => "Commande client", 'watermark' => true, 'orientation' => 'portrait'])

@php($increment = 0)

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Commande client</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    <h4 class="m-0 text-primary">{{ $order->customer->getName() }}</h4>
    <p class="m-0 fs-12">Tél : {{ $order->customer->getFullPhoneNumber() }}</p>
</div>

<h6 class="text-uppercase">REF : {{ $order->getNumber() }}, Date : {{ $order->created_at->format('d/m/Y') }}.</h6>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>N°</th>
            <th>Désignation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Qté</th>
            <th>PVU HT</th>
            <th>PVT HT</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($order->products as $product)
            <tr>
                <td>{{ ++$increment }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->mark }}</td>
                <td>{{ $product->ref }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->pivot->selling_price }}</td>
                <td>{{ $product->pivot->selling_price * $product->pivot->quantity }}</td>
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
            <td colspan="3">{{ $order->getVat() }}</td>
        </tr>
        <tr>
            <th colspan="4">Remise</th>
            <td colspan="3">{{ $order->getDiscount() }}</td>
        </tr>
        <tr class="table-success">
            <th colspan="4">Total HT</th>
            <td colspan="3">{{ $order->totalHT() }}</td>
        </tr>
        <tr>
            <th colspan="4">Total TVA</th>
            <td colspan="3">{{ $order->totalTVA() }}</td>
        </tr>
        <tr class="table-warning">
            <th colspan="4">Total TTC</th>
            <td colspan="3">{{ $order->totalTTC() }}</td>
        </tr>
    </tfoot>
</table>

<p class="text-dark">Arrêté la présente facture à la somme de {{ numberTransformer($order->totalTTC()) }}</p>
@endsection
@extends('layouts.pdf', ['title' => "Reçu bon de commande", 'watermark' => true, 'orientation' => 'portrait'])

@php($increment = 0)

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Reçu bon de commande</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    <p class="m-0">
        <x-library :library='$purchasePayment->purchase->provider->getLibrary()' class="img100_100" />
    </p>
    <h4 class="m-0 text-primary">{{ $purchasePayment->purchase->provider->getName() }}</h4>
    <p class="m-0 fs-12">Tél : {{ $purchasePayment->purchase->provider->getFullPhoneNumber() }}</p>
</div>

<h6 class="text-uppercase">REF : {{ $purchasePayment->purchase->getNumber() }} | {{ session('sessionSociety')->enterprise->city }}-{{ session('sessionSociety')->enterprise->country->name }}, Date : {{ $purchasePayment->purchase->created_at->format('d/m/Y') }}.</h6>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>N°</th>
            <th>Désignation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Unité</th>
            <th>Commnentaire</th>
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
</table>

<x-signature />
@endsection
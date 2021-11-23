@extends('layouts.pdf', ['title' => "Commande fournisseur", 'watermark' => true, 'orientation' => 'portrait'])

@php($increment = 0)

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Commande fournisseur</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    <h4 class="m-0 text-primary">{{ $purchase->provider->getName() }}</h4>
    <p class="m-0 fs-12">Tél : {{ $purchase->provider->getFullPhoneNumber() }}</p>
</div>

<h6 class="text-uppercase">REF : {{ $purchase->getNumber() }} | {{ session('sessionSociety')->enterprise->city }}-{{ session('sessionSociety')->enterprise->country->name }}, Date : {{ $purchase->created_at->isoFormat('L') }}.</h6>

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
        @forelse ($purchase->products as $product)
            <tr>
                <td>{{ ++$increment }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->mark }}</td>
                <td>{{ $product->ref }}</td>
                <td>{{ $product->pivot->ordered_quantity }}</td>
                <td></td>
            </tr>
        @empty
        <tr>
            <td colspan="6">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
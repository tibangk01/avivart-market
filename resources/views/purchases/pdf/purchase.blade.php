@extends('layouts.pdf', ['title' => "Bon de commande"])

@php($increment = 0)

@section('body')

<div id="watermark">
    <img src="{{ public_path('favicon.png') }}" alt="{{ config('app.name') }}" height="100%" width="100%" />
</div>

<h4 class="text-center text-danger"><u>BON DE COMMANDE</u></h4>

<div class="text-right" style="margin-top: 1cm; margin-bottom: 1cm;">
    <h4 class="m-0 text-info">{{ $purchase->provider->getName() }}</h4>
    <p class="m-0 fs-12">Tél : {{ $purchase->provider->getFullPhoneNumber() }}</p>
</div>

<h6 class="text-uppercase">REF : {{ $purchase->getNumber() }} | {{ session('sessionSociety')->enterprise->city }}-{{ session('sessionSociety')->enterprise->country->name }}, Date : {{ $purchase->created_at->format('d/m/Y') }}.</h6>

<table class="table table-bordered table-sm">
    <thead>
        <tr class="text-center">
            <th>N°</th>
            <th>Désignation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Qté</th>
            <th>Commnentaire</th>
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
            <td colspan="6">
                Pas d'enregistrements.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<table class="table table-borderless table-sm" style="margin-top: 2cm;">
    <tr>
        <td class="w-75"></td>
        <td class="w-25">
            <p><u>Le Service Commercial</u></p>
            <br><br><br>
            <p>{{ auth()->user()->full_name }}</p>
        </td>
    </tr>
</table>

@endsection
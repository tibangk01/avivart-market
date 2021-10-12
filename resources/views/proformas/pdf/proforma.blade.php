@extends('layouts.pdf', ['title' => "Proforma"])

@php($increment = 0)

@section('body')
<h4 class="text-center text-danger"><u>PROFORMA</u></h4>

<h6>REF : {{ $proforma->getNumber() }} | {{ session('sessionSociety')->enterprise->city }}, {{ $proforma->created_at->format('d M Y') }}.</h6>

<h4 class="text-center text-info">
    {{ $proforma->customer->getName() }}
</h4>

<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>Désignation</th>
            <th>Unité</th>
            <th>Prix Unitaire HT</th>
            <th>Prix Total HT</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($proforma->products as $product)
            <tr>
                <th>{{ ++$increment }}</th>
                <td>{{ $product->name }}</td>
                <th>{{ $product->pivot->quantity }}</th>
                <th>{{ $product->purchase_price }}</th>
                <th>{{ $product->selling_price * $product->pivot->quantity }}</th>
            </tr>
        @empty
        <tr>
            <td colspan="5">
                Pas d'enregistrements.
            </td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">TVA</th>
            <td>{{ $proforma->vat->percentage }}</td>
        </tr>
        <tr>
            <th colspan="4">Remise</th>
            <td>{{ $proforma->discount->amount }}</td>
        </tr>
        <tr>
            <th colspan="4">Total HT</th>
            <td>{{ $proforma->totalHT() }}</td>
        </tr>
        <tr>
            <th colspan="4">Total TVA</th>
            <td>{{ $proforma->totalTVA() }}</td>
        </tr>
        <tr>
            <th colspan="4">Total TTC</th>
            <td>{{ $proforma->totalTTC() }}</td>
        </tr>
    </tfoot>
</table>

<p class="text-dark">Arrêté le présent proforma à la somme de {{ numberInLetter($proforma->totalTTC()) }}</p>

<table class="table table-borderless table-sm">
    <tr>
        <td class="w-75"></td>
        <td class="w-25">
            <p>Le Service Commercial</p>
            <br><br><br><br>
            <p>{{ auth()->user()->full_name }}</p>
        </td>
    </tr>
</table>
@endsection
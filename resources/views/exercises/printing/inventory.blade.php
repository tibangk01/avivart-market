@extends('layouts.pdf', ['title' => "Inventaire", 'watermark' => true, 'orientation' => 'landscape'])

@php
    use App\Models\Supply;
    
    $supplies = 0; $sales = 0; $mu = 0; $ca = 0; $vt = 0;
@endphp

@section('body')

<h4 class="text-center text-dark"><u>{{ $exercise->title }}</u></h4>

<table class="table table-bordered table-sm">
    <tr>
        <th>Période d'inventaire : {{ $exercise->getPeriod() }}</th>
        <th class="text-right">Date de Création : {{ $exercise->created_at->isoFormat('L LTS') }}</th>
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
            <td class="text-center">{{ $product->pivot->initial_stock }}</td>
            <td class="text-center">
                {{ $supplies = Supply::countSupplies($exercise, $product) }}
            </td>
            <td class="text-center">{{ $product->pivot->final_stock }}</td>
            <td class="text-center">{{ $product->pivot->loss }}</td>
            <td class="text-center">
                {{ $sales = ($product->pivot->initial_stock + $supplies) - ($product->pivot->loss - $product->pivot->final_stock) }}
            </td>
            <td class="text-center">{{ $product->pivot->purchase_price }}</td>
            <td class="text-center">{{ $product->pivot->selling_price }}</td>
            <td class="text-center">
                {{ $mu = $product->pivot->selling_price - $product->pivot->purchase_price }}
            </td>
            <td class="text-center">
                {{ $supplies * $mu }}
            </td>
            <td class="text-center">
                {{ $supplies * $product->pivot->purchase_price }}
            </td>
            <td class="text-center">
                {{ $ca = $supplies * $product->pivot->selling_price }}
                @php($vt += $ca)
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="13">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5" class="table-danger">Vente Théorique : {{ $vt }}</th>
            <th colspan="3" class="table-success">Vente Réelle : {{ $exercise->real_sale }}</th>
            <th colspan="5" class="table-warning">
                Remarque :
                @if($vt > $exercise->real_sale)
                    {{ $vt - $exercise->real_sale }} (Manque)
                @elseif($vt < $exercise->real_sale)
                    {{ $exercise->real_sale - $vt }} (Surplus)
                @else
                    {{ $vt - $exercise->real_sale }} (Juste)
                @endif
            </th>
        </tr>
    </tfoot>
</table>

<h5 class="text-danger"><u>Légende :</u></h5>
<table class="table table-bordered table-sm text-center">
    <thead>
        <tr class="fs-12">
            <th>SI</th>
            <th>SF</th>
            <th>PAU</th>
            <th>PVU</th>
            <th>MU</th>
            <th>MG</th>
            <th>TV</th>
            <th>CA</th>
        </tr>
    </thead>
    <tbody>
        <tr class="fs-11">
            <td>Stock Initial</td>
            <td>Stock Final</td>
            <td>Prix d'Achat Unitaire</td>
            <td>Prix de Vente Unitaire</td>
            <td>Marge Unitaire</td>
            <td>Marge Globale</td>
            <td>Total Ventes</td>
            <td>Chiffre d'Affaires</td>
        </tr>
    </tbody>
</table>
@endsection
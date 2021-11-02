@extends('layouts.pdf', ['title' => 'Reçu de Vente', 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark"><u>Reçu de Vente</u></h4>

<p>REF : {{ $quickSale->getNumber() }}</p>

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
            <td>{{ $quickSale->vat->percentage }}</td>
        </tr>
        <tr>
            <td>Remise</td>
            <td>{{ $quickSale->discount->amount }}</td>
        </tr>
        <tr>
            <td>Quantité</td>
            <td>{{ $quickSale->quantity }}</td>
        </tr>
        <tr>
            <td>PVU</td>
            <td>{{ $quickSale->product->selling_price }}</td>
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
@endsection
@extends('layouts.pdf', ['title' => "Ventes rapide", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Ventes rapide</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Numéro</th>
            <th>Produit</th>
            <th>Etat</th>
            <th>Statut</th>
            <th>TVA</th>
            <th>Remise</th>
            <th>Quantité</th>
            <th>PVU</th>
            <th>Total HT</th>
            <th>Total TVA</th>
            <th>Total TTC</th>
            <th>Date de Création</th>
            <th>Date de Modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse($quickSales as $quickSale)
        <tr>
            <td>{{ $quickSale->getNumber() }}</td>
            <td>{{ $quickSale->product->name }}</td>
            <td>{{ $quickSale->order_state->name }}</td>
            <td>{{ $quickSale->getPaid() }}</td>
            <td>{{ $quickSale->getVat() }}</td>
            <td>{{ $quickSale->getDiscount() }}</td>
            <td>{{ $quickSale->quantity }}</td>
            <td>{{ $quickSale->selling_price }}</td>
            <td>{{ $quickSale->totalHT() }}</td>
            <td>{{ $quickSale->totalTVA() }}</td>
            <td>{{ $quickSale->totalTTC() }}</td>
            <td>{{ $quickSale->created_at }}</td>
            <td>{{ $quickSale->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="13">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
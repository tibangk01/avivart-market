@extends('layouts.pdf', ['title' => "Payements fournisseur", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Payements fournisseur</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Numéro</th>
            <th>Fournisseur</th>
            <th>TVA</th>
            <th>Remise</th>
            <th>Total TTC</th>
            <th>Date de Création</th>
            <th>Date de Modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($purchasePayments as $purchasePayment)
        <tr>
            <td>{{ $purchasePayment->purchase->getNumber() }}</td>
            <td>{{ $purchasePayment->purchase->provider->getName() }}</td>
            <td>{{ $purchasePayment->purchase->getVat() }}</td>
            <td>{{ $purchasePayment->purchase->getDiscount() }}</td>
            <td>{{ $purchasePayment->purchase->totalTTC() }}</td>
            <td>{{ $purchasePayment->purchase->created_at }}</td>
            <td>{{ $purchasePayment->purchase->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
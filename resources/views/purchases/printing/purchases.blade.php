@extends('layouts.pdf', ['title' => "Commandes fournisseur", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Commandes fournisseur</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Numéro</th>
            <th>Fournisseur</th>
            <th>TVA</th>
            <th>Remise</th>
            <th>Total TTC</th>
            <th>Date de Création</th>
            <th>Date de modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($purchases as $purchase)
        <tr>
            <td>{{ $purchase->getNumber() }}</td>
            <td>{{ $purchase->provider->getName() }}</td>
            <td>{{ $purchase->getVat() }}</td>
            <td>{{ $purchase->getDiscount() }}</td>
            <td>{{ $purchase->totalTTC() }}</td>
            <td>{{ $purchase->created_at }}</td>
            <td>{{ $purchase->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
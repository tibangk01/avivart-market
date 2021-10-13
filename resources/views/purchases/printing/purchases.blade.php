@extends('layouts.pdf', ['title' => "Liste des bons de commande", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark"><u>LISTE DES BONS DE COMMANDE</u></h4>

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
            <td>{{ $purchase->vat->percentage }}</td>
            <td>{{ $purchase->discount->amount }}</td>
            <td>{{ $purchase->totalTTC() }}</td>
            <td>{{ $purchase->created_at }}</td>
            <td>{{ $purchase->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7">Pas d'enregistrements.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
@extends('layouts.pdf', ['title' => "Liste des factures", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Factures</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Numéro</th>
            <th>Client</th>
            <th>Etat</th>
            <th>TVA</th>
            <th>Remise</th>
            <th>Total TTC</th>
            <th>Date de Création</th>
            <th>Date de modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
        <tr>
            <td>{{ $order->getNumber() }}</td>
            <td>{{ $order->customer->getName() }}</td>
            <td>{{ $order->order_state->name }}</td>
            <td>{{ $order->vat->percentage }}</td>
            <td>{{ $order->discount->amount }}</td>
            <td>{{ $order->totalTTC() }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
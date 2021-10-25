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
        @forelse ($orderPayments as $orderPayment)
        <tr>
            <td>{{ $orderPayment->order->getNumber() }}</td>
            <td>{{ $orderPayment->order->customer->getName() }}</td>
            <td>{{ $orderPayment->order->order_state->name }}</td>
            <td>{{ $orderPayment->order->vat->percentage }}</td>
            <td>{{ $orderPayment->order->discount->amount }}</td>
            <td>{{ $orderPayment->order->totalTTC() }}</td>
            <td>{{ $orderPayment->order->created_at }}</td>
            <td>{{ $orderPayment->order->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
@extends('layouts.pdf', ['title' => "Payements client", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Payements client</u></h4>

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
            <td>{{ $orderPayment->order->getVat() }}</td>
            <td>{{ $orderPayment->order->getDiscount() }}</td>
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
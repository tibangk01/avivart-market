@extends('layouts.pdf', ['title' => "Commandes client", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Commandes client</u></h4>

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
            <th>Date de Modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
        <tr>
            <td>{{ $order->getNumber() }}</td>
            <td>{{ $order->customer->getName() }}</td>
            <td>{{ $order->order_state->name }}</td>
            <td>{{ $order->getVat() }}</td>
            <td>{{ $order->getDiscount() }}</td>
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
@extends('layouts.pdf', ['title' => "Payements vente rapide", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Payements vente rapide</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Vente rapide</th>
            <th>Montant</th>
            <th>Mode de payement</th>
            <th>N° de chèque</th>
            <th>Date de Création</th>
            <th>Date de Modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($quickSalePayments as $quickSalePayment)
        <tr>
            <td>{{ $quickSalePayment->quick_sale->getNumber() }}</td>
            <td>{{ $quickSalePayment->payment->amount }}</td>
            <td>{{ $quickSalePayment->payment->payment_mode->name }}</td>
            <td>{{ $quickSalePayment->payment->cheque_number }}</td>
            <td>{{ $quickSalePayment->created_at }}</td>
            <td>{{ $quickSalePayment->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
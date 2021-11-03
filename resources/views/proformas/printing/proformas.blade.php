@extends('layouts.pdf', ['title' => "Proformas", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark text-uppercase"><u>Proformas</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Numéro</th>
            <th>Client</th>
            <th>TVA</th>
            <th>Remise</th>
            <th>Total TTC</th>
            <th>Date de Création</th>
            <th>Date de modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($proformas as $proforma)
        <tr>
            <td>{{ $proforma->getNumber() }}</td>
            <td>{{ $proforma->customer->getName() }}</td>
            <td>{{ $proforma->getVat() }}</td>
            <td>{{ $proforma->getDiscount() }}</td>
            <td>{{ $proforma->totalTTC() }}</td>
            <td>{{ $proforma->created_at }}</td>
            <td>{{ $proforma->updated_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7">Pas d'enregistrements</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
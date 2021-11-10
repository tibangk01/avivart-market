@extends('layouts.pdf', ['title' => "Liste des points de vente", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark"><u>LISTE DES POINTS DE VENTE</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Région</th>
            <th>Agence</th>
            <th>Date de Création</th>
            <th>Date de Modification</th>
        </tr>
    </thead>
    <tbody>
        @forelse($salePlaces as $salePlace)
            <tr>
                <td>{{ $salePlace->enterprise->code }}</td>
                <td>{{ $salePlace->enterprise->name }}</td>
                <td>{{ $salePlace->enterprise->getFullPhoneNumber() }}</td>
                <td>{{ $salePlace->enterprise->email }}</td>
                <td>{{ $salePlace->enterprise->region->name }}</td>
                <td>{{ $salePlace->agency->enterprise->name }}</td>
                <td>{{ $salePlace->created_at }}</td>
                <td>{{ $salePlace->updated_at }}</td>
        @empty
        <tr>
            <td colspan="8">Pas d'enregistrment</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
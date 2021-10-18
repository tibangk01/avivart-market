@extends('layouts.pdf', ['title' => "Liste des agences", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark"><u>LISTE DES AGENCES</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Région</th>
            <th>Nombre de Points de vente</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($agencies as $agency)
            <tr>
                <td>{{ $agency->enterprise->code }}</td>
                <td>{{ $agency->enterprise->name }}</td>
                <td>{{ $agency->enterprise->phone_number }}</td>
                <td>{{ $agency->enterprise->email }}</td>
                <td>{{ $agency->enterprise->region->name }}</td>
                <td>{{ $agency->sale_places->count() }}</td>
        @empty
        <tr>
            <td colspan="6">Pas d'enregistrment</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
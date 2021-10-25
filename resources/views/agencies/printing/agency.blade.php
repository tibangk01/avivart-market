@extends('layouts.pdf', ['title' => $agency->enterprise->name, 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark"><u>{{ $agency->enterprise->name }}</u></h4>

<p class="my-2">
<x-library :library='$agency->enterprise->library' class="img100_100" />
</p>

<table class="table table-bordered table-stripped table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Clé</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Code</th>
            <td>{{ $agency->enterprise->code }}</td>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{ $agency->enterprise->name }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $agency->enterprise->phone_number }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $agency->enterprise->email }}</td>
        </tr>
        <tr>
            <th>Région</th>
            <td>{{ $agency->enterprise->region->name }}</td>
        </tr>
        <tr>
            <th>Site web</th>
            <td>{{ $agency->enterprise->website }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $agency->enterprise->address }}</td>
        </tr>
        <tr>
            <th>Pays</th>
            <td>{{ $agency->enterprise->country->name }}</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>{{ $agency->enterprise->city }}</td>
        </tr>
        <tr>
            <th>Date de Création</th>
            <td>{{ $agency->created_at }}</td>
        </tr>
        <tr>
            <th>Date de mis à jour</th>
            <td>{{ $agency->updated_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
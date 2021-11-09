@extends('layouts.pdf', ['title' => $salePlace->enterprise->name, 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark"><u>{{ $salePlace->enterprise->name }}</u></h4>

<p class="my-2">
<x-library :library='$salePlace->enterprise->library' class="img100_100" />
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
            <td>{{ $salePlace->enterprise->code }}</td>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{ $salePlace->enterprise->name }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $salePlace->enterprise->getFullPhoneNumber() }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $salePlace->enterprise->email }}</td>
        </tr>
        <tr>
            <th>Région</th>
            <td>{{ $salePlace->enterprise->region->name }}</td>
        </tr>
        <tr>
            <th>Site web</th>
            <td>{{ $salePlace->enterprise->website }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $salePlace->enterprise->address }}</td>
        </tr>
        <tr>
            <th>Pays</th>
            <td>{{ $salePlace->enterprise->country->name }}</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>{{ $salePlace->enterprise->city }}</td>
        </tr>
        <tr>
            <th>Agence</th>
            <td>{{ $salePlace->agency->enterprise->name }}</td>
        </tr>
        <tr>
            <th>Date de création</th>
            <td>{{ $salePlace->created_at }}</td>
        </tr>
        <tr>
            <th>Date de modification</th>
            <td>{{ $salePlace->updated_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
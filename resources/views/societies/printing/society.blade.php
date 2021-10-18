@extends('layouts.pdf', ['title' => $society->enterprise->name, 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark"><u>{{ $society->enterprise->name }}</u></h4>

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
            <td>{{ $society->enterprise->code }}</td>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{ $society->enterprise->name }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td><a href="tel:{{ str_replace(' ', '', $society->enterprise->getFullPhoneNumber()) }}">{{ $society->enterprise->getFullPhoneNumber() }}</a></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><a href="mailto:{{ $society->enterprise->email }}">{{ $society->enterprise->email }}</a></td>
        </tr>
        <tr>
            <th>Région</th>
            <td>{{ $society->enterprise->region->name }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $society->enterprise->address }}</td>
        </tr>
        <tr>
            <th>Code Postal</th>
            <td>{{ $society->enterprise->postal_code }}</td>
        </tr>
        <tr>
            <th>Pays</th>
            <td>{{ $society->enterprise->country->name }}</td>
        </tr>
        <tr>
            <th>Région</th>
            <td>{{ $society->enterprise->region->name }}</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>{{ $society->enterprise->city }}</td>
        </tr>
        <tr>
            <th>Site web</th>
            <td><a target="_blank" href="{{ $society->enterprise->website}}">{{ $society->enterprise->website }}</a></td>
        </tr>
        <tr>
            <th>Code Fiscal</th>
            <td>{{ $society->fiscal_code }}</td>
        </tr>
        <tr>
            <th>RCCM</th>
            <td>{{ $society->tppcr }}</td>
        </tr>
        <tr>
            <th>Date de création</th>
            <td>{{ $society->created_at }}</td>
        </tr>
        <tr>
            <th>Date de mise à jour</th>
            <td>{{ $society->updated_at }}</td>
        </tr>
        <tr>
            <th>Nombre d'Agence</th>
            <td>{{ $society->agencies->count() }}</td>
        </tr>
    </tbody>
</table>
@endsection
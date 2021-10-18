@extends('layouts.pdf', ['title' => $staff->human->username, 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark"><u>{{ $staff->human->username }}</u></h4>

<p>
<x-library :library='$staff->human->user->library' class="img200_200" />
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
            <th>Pays</th>
            <td>{{ $staff->human->user->country->name }}</td>
        </tr>
        <tr>
            <th>Rôle</th>
            <td>{{ $staff->human->role->name }}</td>
        </tr>
        <tr>
            <th>Civilité</th>
            <td>{{ $staff->human->user->civility->name }}</td>
        </tr>
        <tr>
            <th>Nom & prénom</th>
            <td>{{ $staff->human->user->full_name }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $staff->human->user->phone_number }}</td>
        </tr>
        <tr>
            <th>Signature numérique</th>
            <td>{{ $staff->human->signature }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $staff->human->user->email }}</td>
        </tr>
        <tr>
            <th>Fonction</th>
            <td>{{ $staff->human->work->name }}</td>
        </tr>
        <tr>
            <th>Type de staff</th>
            <td>{{ $staff->staff_type->name }}</td>
        </tr>
        <tr>
            <th>Date de création</th>
            <td>{{ $staff->created_at }}</td>
        </tr>
        <tr>
            <th>Date de modification</th>
            <td>{{ $staff->updated_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
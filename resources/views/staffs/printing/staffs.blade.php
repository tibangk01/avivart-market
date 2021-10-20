@extends('layouts.pdf', ['title' => "Liste des staffs", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark"><u>LISTE DES STAFFS</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Nom & Prénom</th>
            <th>Nom d'utilisateur</th>
            <th>Sign. Num.</th>
            <th>Fonction</th>
            <th>Type de staff</th>
            <th>Téléphone</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($staffs as $staff)
            <tr>
                <td>{{ $staff->human->user->full_name }}</td>
                <td>{{ $staff->human->username }}</td>
                <td>{{ $staff->human->signature }}</td>
                <td>{{ $staff->human->work->name }}</td>
                <td>{{ $staff->staff_type->name }}</td>
                <td>{{ $staff->human->user->phone_number }}</td>
                <td>{{ $staff->created_at }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="7">Pas d'enregistrements.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
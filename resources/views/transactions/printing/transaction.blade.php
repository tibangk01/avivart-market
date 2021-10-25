@extends('layouts.pdf', ['title' => $transaction->user->full_name, 'watermark' => true, 'orientation' => 'portrait'])

@section('body')
<h4 class="text-center text-dark"><u>{{ $transaction->user->full_name }}</u></h4>

<p class="my-2">
<x-library :library='$transaction->user->library' class="img100_100" />
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
            <th>Utilisateur</th>
            <td>{{ $transaction->user->full_name }}</td>
        </tr>
        <tr>
            <th>Type de transaction</th>
            <td>{{ $transaction->transaction_type->name }}</td>
        </tr>
        <tr>
            <th>Activité</th>
            <td>{{ $transaction->activity }}</td>
        </tr>
        <tr>
            <th>Date de création</th>
            <td>{{ $transaction->created_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
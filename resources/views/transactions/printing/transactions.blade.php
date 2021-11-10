@extends('layouts.pdf', ['title' => "Liste des transactions", 'watermark' => true, 'orientation' => 'landscape'])

@section('body')
<h4 class="text-center text-dark"><u>LISTE DES TRANSACTIONS</u></h4>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>Utilisateur</th>
            <th>Type de transaction</th>
            <th>Activité</th>
            <th>Date de Création</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->user->full_name }}</td>
                <td>{{ $transaction->transaction_type->name }}</td>
                <td>{{ $transaction->activity }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="4">Pas d'enregistrements.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
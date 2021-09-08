@extends('layouts.dashboard', ['title' => "Détails du client"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-stripped table-hover mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Clé</th>
                                    <th>Valeur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Type</td>
                                    <td>{{ $customer->person_type->name }}</td>
                                </tr>
                                <tr>
                                    <td>Civilité</td>
                                    <td>{{ $customer->person->user->civility->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nom</td>
                                    <td>{{ $customer->person->user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Prénom</td>
                                    <td>{{ $customer->person->user->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $customer->person->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td>{{ $customer->person->user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $customer->person->user->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
                                    <td>{{ $customer->person->user->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('customer.edit', 'Editer', ['customer' => $customer], ['class' => 'text-warning']) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

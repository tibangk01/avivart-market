@extends('layouts.dashboard', ['title' => 'Afficher une agence'])

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
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('agency.edit','Editer', ['agency' => $agency], ['class' => 'text-warning'] ) !!}
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

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
                                    <td>Code</td>
                                    <td>{{ $agency->enterprise->code }}</td>
                                </tr>
                                <tr>
                                    <td>Nom</td>
                                    <td>{{ $agency->enterprise->name }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td>{{ $agency->enterprise->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $agency->enterprise->email }}</td>
                                </tr>
                                <tr>
                                    <td>Site web</td>
                                    <td>{{ $agency->enterprise->website }}</td>
                                </tr>
                                <tr>
                                    <td>Adresse</td>
                                    <td>{{ $agency->enterprise->address }}</td>
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

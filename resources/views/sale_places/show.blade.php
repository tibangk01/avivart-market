@extends('layouts.dashboard', ['title' => 'Afficher un point de vente'])

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
                                    <td>{{ $salePlace->enterprise->code }}</td>
                                </tr>
                                <tr>
                                    <td>Nom</td>
                                    <td>{{ $salePlace->enterprise->name }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td>{{ $salePlace->enterprise->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $salePlace->enterprise->email }}</td>
                                </tr>
                                <tr>
                                    <td>Site web</td>
                                    <td>{{ $salePlace->enterprise->website }}</td>
                                </tr>
                                <tr>
                                    <td>Adresse</td>
                                    <td>{{ $salePlace->enterprise->address }}</td>
                                </tr>
                                <tr>
                                    <td>Agence</td>
                                    <td>{{ $salePlace->agency->enterprise->name }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $salePlace->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de modification</td>
                                    <td>{{ $salePlace->updated_at->diffForHumans() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('sale_place.edit', 'Editer', ['sale_place' => $salePlace], ['class' => 'text-warning']) !!}
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

@extends('layouts.dashboard', ['title' => 'Afficher un point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                <div>
                    <x-library :library='$salePlace->enterprise->library' class="img200_200" />
                    <a href="{{ route('library.edit', $salePlace->enterprise->library) }}"><i class="fas fa-edit"></i> Editer</a>
                </div>

                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-striped table-hover mb-0">
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
                                    <td>{{ $salePlace->enterprise->phone_number }}</td>
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

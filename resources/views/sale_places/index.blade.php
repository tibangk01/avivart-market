@extends('layouts.dashboard', ['title' => 'Liste des points de ventes'])

@section('body')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste</a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body py-1">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">

                                    <div class="d-flex">
                                        <div class="ml-auto">
                                            <a class="btn btn-flat btn-primary mb-1"
                                                href="{{ route('sale_place.create') }}"><i class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Nom</th>
                                                    <th>Téléphone</th>
                                                    <th>Email</th>
                                                    <th>Adresse</th>
                                                    <th>Site web</th>
                                                    <th>Agence</th>
                                                    <th>Date de création</th>
                                                    <th>Date de modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($salePlaces as $salePlace)
                                                    <tr>
                                                        <td>{{ $salePlace->enterprise->code }}</td>
                                                        <td>{{ $salePlace->enterprise->name }}</td>
                                                        <td>{{ $salePlace->enterprise->phone_number }}</td>
                                                        <td>{{ $salePlace->enterprise->email }}</td>
                                                        <td>{{ $salePlace->enterprise->address }}</td>
                                                        <td>{{ $salePlace->enterprise->website }}</td>
                                                        <td>{{ $salePlace->agency->enterprise->name }}</td>
                                                        <td>{{ $salePlace->created_at->diffForHumans() }}</td>
                                                        <td>{{ $salePlace->updated_at->diffForHumans() }}</td>
                                                        <td>
                                                            <a class="btn btn-info btn-xs"
                                                            href="{{ route('sale_place.show', $salePlace) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('sale_place.edit', $salePlace) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('sale_place.destroy', $salePlace) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>

                                                        </td>
                                                    </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="10">Pas d'enregistrment</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.dashboard', ['title' => 'Points de vente'])

@section('body')
    <div class="content">
        <div class="container-fluid">
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
                                        <div class="ml-auto mb-1">
                                            <x-print-all-record routeName="sale_place.printing.all" />
                                            
                                            <x-create-record routeName="sale_place.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th></th>
                                                    <th>Code</th>
                                                    <th>Nom</th>
                                                    <th>Téléphone</th>
                                                    <th>Email</th>
                                                    <th>Région</th>
                                                    <th>Agence</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($salePlaces as $salePlace)
                                                    <tr>
                                                        <td><x-library :library='$salePlace->enterprise->library' class="img25_25" /></td>
                                                        <td>{{ $salePlace->enterprise->code }}</td>
                                                        <td>{{ $salePlace->enterprise->name }}</td>
                                                        <td>{{ $salePlace->enterprise->getFullPhoneNumber() }}</td>
                                                        <td>{{ $salePlace->enterprise->email }}</td>
                                                        <td>{{ $salePlace->enterprise->region->name }}</td>
                                                        <td>{{ $salePlace->agency->enterprise->name }}</td>
                                                        <td>{{ $salePlace->created_at }}</td>
                                                        <td>{{ $salePlace->updated_at }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="sale_place.show" :routeParam="$salePlace->id" />
                                                            
                                                            <x-edit-record routeName="sale_place.edit" :routeParam="$salePlace->id" />

                                                            <x-destroy-record routeName="sale_place.destroy" :routeParam="$salePlace->id" />

                                                            <x-print-one-record routeName="sale_place.printing.one" :routeParam="$salePlace->id" />
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

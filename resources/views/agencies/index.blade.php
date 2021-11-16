@extends('layouts.dashboard', ['title' => 'Agences'])

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
                                            <x-print-all-record routeName="agency.printing.all" />
                                            
                                            <x-create-record routeName="agency.create" />
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
                                                    <th>Nombre de Points de vente</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($agencies as $agency)
                                                    <tr>
                                                        <td><x-library :library='$agency->enterprise->library' class="img25_25" /></td>
                                                        <td>{{ $agency->enterprise->code }}</td>
                                                        <td>{{ $agency->enterprise->name }}</td>
                                                        <td>{{ $agency->enterprise->getFullPhoneNumber() }}</td>
                                                        <td>{{ $agency->enterprise->email }}</td>
                                                        <td>{{ $agency->enterprise->region->name }}</td>
                                                        <td>{{ $agency->sale_places->count() }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="agency.show" :routeParam="$agency->id" />
                                                            
                                                            <x-edit-record routeName="agency.edit" :routeParam="$agency->id" />

                                                            <x-destroy-record routeName="agency.destroy" :routeParam="$agency->id" />

                                                            <x-print-one-record routeName="agency.printing.one" :routeParam="$agency->id" />
                                                        </td>
                                                    </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="8">Pas d'enregistrment</td>
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

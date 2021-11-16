@extends('layouts.dashboard', ['title' => "Staffs"])

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
                                            <x-print-all-record routeName="staff.printing.all" />
                                            
                                            <x-create-record routeName="staff.create" />
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th></th>
                                                    <th>N° Matricule</th>
                                                    <th>Nom & Prénom</th>
                                                    <th>Nom d'utilisateur</th>
                                                    <th>Sign. Num.</th>
                                                    <th>Fonction</th>
                                                    <th>Type de staff</th>
                                                    <th>Téléphone</th>
                                                    <th>Date de Création</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($staffs as $staff)
                                            <tr>
                                                <td><x-library :library='$staff->human->user->library' class="img25_25" /></td>
                                                <td>{{ $staff->human->serial_number }}</td>
                                                <td>{{ $staff->human->user->full_name }}</td>
                                                <td>{{ $staff->human->username }}</td>
                                                <td>{{ $staff->human->signature }}</td>
                                                <td>{{ $staff->human->work->name }}</td>
                                                <td>{{ $staff->staff_type->name }}</td>
                                                <td>{{ $staff->human->user->getFullPhoneNumber() }}</td>
                                                <td>{{ $staff->created_at }}</td>
                                                <td class="d-flex flex-row justify-content-around align-items-center">
                                                    <x-show-record routeName="staff.show" :routeParam="$staff->id" />
                                                    
                                                    <x-edit-record routeName="staff.edit" :routeParam="$staff->id" />

                                                    <x-destroy-record routeName="staff.destroy" :routeParam="$staff->id" />

                                                    <x-print-one-record routeName="staff.printing.one" :routeParam="$staff->id" />

                                                    <x-print-badge-record routeName="staff.printing.badge" :routeParam="$staff->id" />
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="10">Pas d'enregistrements.</td>
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

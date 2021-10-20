@extends('layouts.dashboard', ['title' => "Liste des staffs"])

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
                                            <a class="btn btn-flat btn-dark" target="_blank" 
                                                            href="{{ route('staff.printing.all') }}"
                                                            title="Imprimer"><i class="fa fa-print"></i> Imprimer</a>
                                                            
                                            <a class="btn btn-flat btn-primary" href="{{ route('staff.create') }}"><i
                                                    class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-center">
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
                                                    <th>Date de création</th>
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
                                                <td>{{ $staff->human->user->phone_number }}</td>
                                                <td>{{ $staff->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-info btn-xs"
                                                        href="{{ route('staff.show', $staff) }}"
                                                        title="Afficher"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a>
                                                    <a class="btn btn-warning btn-xs"
                                                        href="{{ route('staff.edit', $staff) }}"
                                                        title="Modifier"><i class="fa fa-edit"
                                                            aria-hidden="true"></i></a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('staff.destroy', $staff) }}"
                                                        title="Supprimer"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></a>
                                                    <a class="btn btn-dark btn-xs" target="_blank" 
                                                            href="{{ route('staff.printing.one', $staff) }}"
                                                            title="Imprimer"><i class="fa fa-print"
                                                                aria-hidden="true"></i></a>
                                                    <a class="btn btn-success btn-xs" target="_blank" 
                                                            href="{{ route('staff.printing.qrcode', $staff) }}"
                                                            title="QR CODE"><i class="fa fa-qrcode"
                                                                aria-hidden="true"></i></a>
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

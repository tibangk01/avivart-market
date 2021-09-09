@extends('layouts.dashboard', ['title' => "Liste des employés"])

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
                                            <a class="btn btn-flat btn-primary mb-1" href="{{ route('staff.create') }}"><i
                                                    class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom & Prénom</th>
                                                    <th>Sign. Num.</th>
                                                    <th>Fonction</th>
                                                    <th>Téléphone</th>
                                                    <th>Date de création</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if ($staffs->count())
                                                    @foreach ($staffs as $staff)
                                                        <tr>
                                                            <td>
                                                                {{ $staff->human->user->full_name }}
                                                            </td>
                                                            <td>
                                                                {{ $staff->human->signature ? $staff->human->signature : '-' }}
                                                            </td>
                                                            <td>
                                                                {{ $staff->staff_type->name }}
                                                            </td>
                                                            <td>
                                                                {{ $staff->human->user->phone_number }}
                                                            </td>
                                                            <td>
                                                                {{ $staff->created_at->diffForHumans() }}
                                                            </td>

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
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7">
                                                            Pas d'enregistrements.
                                                        </td>
                                                    </tr>
                                                @endif
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

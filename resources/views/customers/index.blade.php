@extends('layouts.dashboard', ['title' => "Liste des clients"])

@section('body')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active rounded-0" id="nav-first-tab" data-toggle="tab"
                                        href="#nav-first" role="tab" aria-controls="nav-first" aria-selected="true">Entreprise</a>

                                    <a class="nav-item nav-link rounded-0" id="nav-second-tab" data-toggle="tab"
                                        href="#nav-second" role="tab" aria-controls="nav-second"
                                        aria-selected="true">Particulier</a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body py-1">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-first" role="tabpanel"
                                    aria-labelledby="nav-first-tab">
                                    <div class="d-flex">
                                        <div class="ml-auto">
                                            <a class="btn btn-flat btn-primary mb-1" href=""><i class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom et prénom</th>
                                                    <th>Email</th>
                                                    <th>Téléphone</th>
                                                    <th>Date de création</th>
                                                    <th>Date de modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                                <tbody>
                                                    @forelse ($people as $customer)
                                                        <tr>
                                                            <td>{{ $customer->person->user->civility->name . ' ' . $customer->person->user->full_name }}
                                                            </td>
                                                            <td>{{ $customer->person->user->email }}</td>
                                                            <td>{{ $customer->person->user->phone_number }}</td>
                                                            <td>{{ $customer->person->user->created_at->diffForHumans() }}
                                                            </td>
                                                            <td>{{ $customer->person->user->updated_at->diffForHumans() }}
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-info btn-xs"
                                                                    href="{{ route('customer.show', $customer) }}"
                                                                    title="Afficher"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a>
                                                                <a class="btn btn-warning btn-xs"
                                                                    href="{{ route('customer.edit', $customer) }}"
                                                                    title="Afficher"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                                <a class="btn btn-danger btn-xs"
                                                                    href="{{ route('customer.destroy', $customer) }}"
                                                                    title="Afficher"><i class="fa fa-trash"
                                                                        aria-hidden="true"></i></a>

                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6"></td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-second" role="tabpanel"
                                    aria-labelledby="nav-second-tab">

                                    <div class="d-flex">
                                        <div class="ml-auto">
                                            <a class="btn btn-flat btn-primary mb-1" href=""><i class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Dénomination</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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

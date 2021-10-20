@extends('layouts.dashboard', ['title' => "Liste des types d'opérations de caisse"])

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
                                        <div class="ml-auto">

                                            <a class="btn btn-flat btn-primary mb-1"
                                                href="{{ route('cash_register_operation_type.create') }}"><i
                                                    class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Dénomination</th>
                                                    <th>Date de création</th>
                                                    <th>Date de mise à jour</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cashRegisterOperationTypes as $cashRegisterOperationType)
                                                <tr>
                                                    <td class="{{ $cashRegisterOperationType->getForeColor() }}">{{ $cashRegisterOperationType->name }}</td>
                                                    <td>{{ $cashRegisterOperationType->created_at }}</td>
                                                    <td>{{ $cashRegisterOperationType->updated_at }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                            href="{{ route('cash_register_operation_type.show', $cashRegisterOperationType) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('cash_register_operation_type.edit', $cashRegisterOperationType) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('cash_register_operation_type.destroy', $cashRegisterOperationType) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">Pas d'enregistrements</td>
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

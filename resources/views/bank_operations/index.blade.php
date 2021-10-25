@extends('layouts.dashboard', ['title' => "Liste des opéations de banque"])

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
                                                href="{{ route('bank_operation.create') }}"><i
                                                    class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Banque</th>
                                                    <th>Type d'opération</th>
                                                    <th>Montant</th>
                                                    <th>Date de création</th>
                                                    <th>Date de mise à jour</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($bankOperations as $bankOperation)
                                                    <tr>
                                                        <td>{{ $bankOperation->bank->name }}</td>
                                                        <td class="{{ $bankOperation->bank_operation_type->getForeColor() }}">{{ $bankOperation->bank_operation_type->name }}</td>
                                                        <td>{{ $bankOperation->amount }}</td>
                                                        <td>{{ $bankOperation->created_at }}</td>
                                                        <td>{{ $bankOperation->updated_at }}</td>
                                                        <td>
                                                            <a class="btn btn-info btn-xs"
                                                                href="{{ route('bank_operation.show', $bankOperation) }}"
                                                                title="Afficher"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-warning btn-xs"
                                                                href="{{ route('bank_operation.edit', $bankOperation) }}"
                                                                title="Modifier"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-danger btn-xs"
                                                                href="{{ route('bank_operation.destroy', $bankOperation) }}"
                                                                title="Supprimer"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">Pas d'enregistrements</td>
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
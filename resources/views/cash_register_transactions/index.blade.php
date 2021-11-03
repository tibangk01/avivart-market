@extends('layouts.dashboard', ['title' => "Transactions de caisse"])

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
                                                href="{{ route('cash_register_transaction.create') }}"><i
                                                    class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Exercice</th>
                                                    <th>Journée</th>
                                                    <th>Staff</th>
                                                    <th>Caisse</th>
                                                    <th>Montant</th>
                                                    <th>Etat</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cashRegisterTransactions as $cashRegisterTransaction)
                                                <tr>
                                                    <td>{{ $cashRegisterTransaction->day_transaction->exercise->getPeriod() }}</td>
                                                    <td>{{ $cashRegisterTransaction->day_transaction->getDay() }}</td>
                                                    <td>{{ $cashRegisterTransaction->staff->human->user->full_name }}</td>
                                                    <td>{{ $cashRegisterTransaction->cash_register->name }}</td>
                                                    <td>{{ $cashRegisterTransaction->amount }}</td>
                                                    <td>{{ $cashRegisterTransaction->getState() }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                                href="{{ route('cash_register_transaction.show', $cashRegisterTransaction) }}"
                                                                title="Afficher"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-warning btn-xs"
                                                                href="{{ route('cash_register_transaction.edit', $cashRegisterTransaction) }}"
                                                                title="Modifier"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-danger btn-xs"
                                                                href="{{ route('cash_register_transaction.destroy', $cashRegisterTransaction) }}"
                                                                title="Supprimer"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7">Pas d'enregistrements</td>
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

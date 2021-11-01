@extends('layouts.dashboard', ['title' => "Liste des payements facture"])

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
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Listes</a>
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
                                                            href="{{ route('order_payment.printing.all') }}"
                                                            title="Imprimer"><i class="fa fa-print"></i> Imprimer</a>

                                            <a class="btn btn-flat btn-primary"
                                                href="{{ route('order_payment.create') }}"><i class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Facture</th>
                                                    <th>Montant</th>
                                                    <th>Mode de payement</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($orderPayments as $orderPayment)
                                                    <tr>
                                                        <td>{{ $orderPayment->order->getNumber() }}</td>
                                                        <td>{{ $orderPayment->payment->amount }}</td>
                                                        <td>{{ $orderPayment->payment->payment_mode->name }}</td>
                                                        <td>{{ $orderPayment->created_at }}</td>
                                                        <td>{{ $orderPayment->created_at }}</td>
                                                        <td>
                                                            <a class="btn btn-info btn-xs"
                                                                href="{{ route('order_payment.show', $orderPayment) }}"
                                                                title="Afficher"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>

                                                            <a class="btn btn-warning btn-xs"
                                                                href="{{ route('order_payment.edit', $orderPayment) }}"
                                                                title="Modifier"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                            
                                                            <a class="btn btn-danger btn-xs"
                                                                href="{{ route('order_payment.destroy', $orderPayment) }}"
                                                                title="Supprimer"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>

                                                            <a class="btn btn-dark btn-xs" target="_blank" 
                                                            href="{{ route('order_payment.printing.one', $orderPayment) }}"
                                                            title="Imprimer"><i class="fa fa-print"
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

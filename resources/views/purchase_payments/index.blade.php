@extends('layouts.dashboard', ['title' => "Payements fournisseur"])

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
                                            <x-print-all-record routeName="purchase_payment.printing.all" />
                                            
                                            <x-create-record routeName="purchase_payment.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Commande fournisseur</th>
                                                    <th>Montant</th>
                                                    <th>Mode de payement</th>
                                                    <th>N° de chèque</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($purchasePayments as $purchasePayment)
                                                    <tr>
                                                        <td>{{ $purchasePayment->purchase->getNumber() }}</td>
                                                        <td>{{ $purchasePayment->payment->amount }}</td>
                                                        <td>{{ $purchasePayment->payment->payment_mode->name }}</td>
                                                        <td>{{ $purchasePayment->payment->cheque_number }}</td>
                                                        <td>{{ $purchasePayment->created_at }}</td>
                                                        <td>{{ $purchasePayment->created_at }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="purchase_payment.show" :routeParam="$purchasePayment->id" />
                                                            
                                                            <x-edit-record routeName="purchase_payment.edit" :routeParam="$purchasePayment->id" />

                                                            <x-destroy-record routeName="purchase_payment.destroy" :routeParam="$purchasePayment->id" />

                                                            <x-print-one-record routeName="purchase_payment.printing.one" :routeParam="$purchasePayment->id" />
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

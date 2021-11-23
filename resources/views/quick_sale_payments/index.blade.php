@extends('layouts.dashboard', ['title' => "Payements vente rapide"])

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
                                            <x-print-all-record routeName="quick_sale_payment.printing.all" />
                                            
                                            <x-create-record routeName="quick_sale_payment.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Vente rapide</th>
                                                    <th>Montant</th>
                                                    <th>Mode de payement</th>
                                                    <th>N° de chèque</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($quickSalePayments as $quickSalePayment)
                                                    <tr>
                                                        <td>{{ $quickSalePayment->quick_sale->getNumber() }}</td>
                                                        <td>{{ $quickSalePayment->payment->amount }}</td>
                                                        <td>{{ $quickSalePayment->payment->payment_mode->name }}</td>
                                                        <td>{{ $quickSalePayment->payment->cheque_number }}</td>
                                                        <td>{{ $quickSalePayment->created_at }}</td>
                                                        <td>{{ $quickSalePayment->created_at }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="quick_sale_payment.show" :routeParam="$quickSalePayment->id" />
                                                            
                                                            <x-edit-record routeName="quick_sale_payment.edit" :routeParam="$quickSalePayment->id" />

                                                            <x-destroy-record routeName="quick_sale_payment.destroy" :routeParam="$quickSalePayment->id" />

                                                            <x-print-one-record routeName="quick_sale_payment.printing.one" :routeParam="$quickSalePayment->id" />
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

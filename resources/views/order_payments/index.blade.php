@extends('layouts.dashboard', ['title' => "Payements client"])

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
                                            <x-print-all-record routeName="order_payment.printing.all" />
                                            
                                            <x-create-record routeName="order_payment.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Commande client</th>
                                                    <th>Montant</th>
                                                    <th>Mode de payement</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
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
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="order_payment.show" :routeParam="$orderPayment->id" />
                                                            
                                                            <x-edit-record routeName="order_payment.edit" :routeParam="$orderPayment->id" />

                                                            <x-destroy-record routeName="order_payment.destroy" :routeParam="$orderPayment->id" />

                                                            <x-print-one-record routeName="order_payment.printing.one" :routeParam="$orderPayment->id" />
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

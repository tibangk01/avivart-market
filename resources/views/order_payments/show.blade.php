@extends('layouts.dashboard', ['title' => "Payement client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clé</th>
                                <th>Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Commande client</th>
                                <td>{{ $orderPayment->order->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Montant</th>
                                <td>{{ $orderPayment->payment->amount }}</td>
                            </tr>
                            <tr>
                                <th>Mode de payement</th>
                                <td>{{ $orderPayment->payment->payment_mode->name }}</td>
                            </tr>
                            <tr>
                                <th>N° de compte</th>
                                <td>{{ $orderPayment->payment->account_number }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $orderPayment->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $orderPayment->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.dashboard', ['title' => "Détails payement"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered table-stripped table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clé</th>
                                <th>Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Facture</th>
                                <td>{{ $orderPayment->order->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Montant</th>
                                <td>{{ $orderPayment->payment->amount }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $orderPayment->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
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

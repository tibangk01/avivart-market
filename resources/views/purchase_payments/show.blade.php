@extends('layouts.dashboard', ['title' => "Détails payement"])

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
                                <th>Facture</th>
                                <td>{{ $purchasePayment->purchase->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Montant</th>
                                <td>{{ $purchasePayment->payment->amount }}</td>
                            </tr>
                            <tr>
                                <th>Mode de payement</th>
                                <td>{{ $purchasePayment->payment->payment_mode->name }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $purchasePayment->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $purchasePayment->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

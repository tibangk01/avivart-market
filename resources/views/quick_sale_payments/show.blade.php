@extends('layouts.dashboard', ['title' => "Payement vente rapide"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clé</th>
                                <th>Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Vente rapide</th>
                                <td>{{ $quickSalePayment->quick_sale->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Montant</th>
                                <td>{{ $quickSalePayment->payment->amount }}</td>
                            </tr>
                            <tr>
                                <th>Mode de payement</th>
                                <td>{{ $quickSalePayment->payment->payment_mode->name }}</td>
                            </tr>
                            <tr>
                                <th>N° de chèque</th>
                                <td>{{ $quickSalePayment->payment->cheque_number }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $quickSalePayment->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $quickSalePayment->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

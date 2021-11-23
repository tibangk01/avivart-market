@extends('layouts.dashboard', ['title' => 'Vente rapide'])

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
                                    <th>Statut</th>
                                    <td>{{ $quickSale->getPaid() }}</td>
                                </tr>
                                <tr>
                                    <th>Produit</th>
                                    <td>{{ $quickSale->product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Etat</th>
                                    <td>{{ $quickSale->order_state->name }}</td>
                                </tr>
                                <tr>
                                    <th>TVA</th>
                                    <td>{{ $quickSale->getVat() }}</td>
                                </tr>
                                <tr>
                                    <th>Remise</th>
                                    <td>{{ $quickSale->getDiscount() }}</td>
                                </tr>
                                <tr>
                                    <th>Quantité</th>
                                    <td>{{ $quickSale->quantity }}</td>
                                </tr>
                                <tr>
                                    <th>PVU</th>
                                    <td>{{ $quickSale->selling_price }}</td>
                                </tr>
                                <tr>
                                    <th>Total HT</th>
                                    <td>{{ $quickSale->totalHT() }}</td>
                                </tr>
                                <tr>
                                    <th>Total TVA</th>
                                    <td>{{ $quickSale->totalTVA() }}</td>
                                </tr>
                                <tr>
                                    <th>Total TTC</th>
                                    <td>{{ $quickSale->totalTTC() }}</td>
                                </tr>
                                <tr>
                                    <th>Date de Création</th>
                                    <td>{{ $quickSale->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Date de Modification</th>
                                    <td>{{ $quickSale->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.dashboard', ['title' => 'Vente rapide'])

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
                                    <td>Product</td>
                                    <td>{{ $quickSale->product->name }}</td>
                                </tr>
                                <tr>
                                    <td>TVA</td>
                                    <td>{{ $quickSale->vat->percentage }}</td>
                                </tr>
                                <tr>
                                    <td>Remise</td>
                                    <td>{{ $quickSale->discount->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Quantité</td>
                                    <td>{{ $quickSale->quantity }}</td>
                                </tr>
                                <tr>
                                    <td>PVU</td>
                                    <td>{{ $quickSale->product->selling_price }}</td>
                                </tr>
                                <tr>
                                    <td>Total HT</td>
                                    <td>{{ $quickSale->totalHT() }}</td>
                                </tr>
                                <tr>
                                    <td>Total TVA</td>
                                    <td>{{ $quickSale->totalTVA() }}</td>
                                </tr>
                                <tr>
                                    <td>Total TTC</td>
                                    <td>{{ $quickSale->totalTTC() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $quickSale->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
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

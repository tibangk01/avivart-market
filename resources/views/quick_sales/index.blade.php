@extends('layouts.dashboard', ['title' => "Ventes rapide"])

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
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste</a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body py-1">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">

                                    <div class="d-flex">
                                        <div class="ml-auto mb-1">
                                            <x-create-record routeName="quick_sale.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Numéro</th>
                                                    <th>Produit</th>
                                                    <th>TVA</th>
                                                    <th>Remise</th>
                                                    <th>Quantité</th>
                                                    <th>PVU</th>
                                                    <th>Total HT</th>
                                                    <th>Total TVA</th>
                                                    <th>Total TTC</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($quickSales as $quickSale)
                                                    <tr>
                                                        <td>{{ $quickSale->getNumber() }}</td>
                                                        <td>{{ $quickSale->product->name }}</td>
                                                        <td>{{ $quickSale->getVat() }}</td>
                                                        <td>{{ $quickSale->getDiscount() }}</td>
                                                        <td>{{ $quickSale->quantity }}</td>
                                                        <td>{{ $quickSale->selling_price }}</td>
                                                        <td>{{ $quickSale->totalHT() }}</td>
                                                        <td>{{ $quickSale->totalTVA() }}</td>
                                                        <td>{{ $quickSale->totalTTC() }}</td>
                                                        <td>{{ $quickSale->created_at }}</td>
                                                        <td>{{ $quickSale->updated_at }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="quick_sale.show" :routeParam="$quickSale->id" />
                                                            
                                                            <x-edit-record routeName="quick_sale.edit" :routeParam="$quickSale->id" />

                                                            <x-destroy-record routeName="quick_sale.destroy" :routeParam="$quickSale->id" />

                                                            <x-print-one-record routeName="quick_sale.printing.receipt" :routeParam="$quickSale->id" />
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="12">Pas d'enregistrements</td>
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

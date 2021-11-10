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
                                        <div class="ml-auto">

                                            <a class="btn btn-flat btn-primary mb-1" href="{{ route('quick_sale.create') }}" target="_blank"><i
                                                    class="fa fa-plus"></i>
                                                Ajouter</a>
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
                                                        <td>
                                                            <a class="btn btn-info btn-xs"
                                                                href="{{ route('quick_sale.show', $quickSale) }}"
                                                                title="Afficher"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-warning btn-xs"
                                                                href="{{ route('quick_sale.edit', $quickSale) }}"
                                                                title="Modifier"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-danger btn-xs"
                                                                href="{{ route('quick_sale.destroy', $quickSale) }}"
                                                                title="Supprimer"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-dark btn-xs" target="_blank" 
                                                    href="{{ route('quick_sale.printing.receipt', $quickSale) }}"
                                                    title="Imprimer"><i class="fa fa-print"
                                                        aria-hidden="true"></i></a>
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

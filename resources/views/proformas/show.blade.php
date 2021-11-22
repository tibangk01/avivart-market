 @extends('layouts.dashboard', ['title' => "Proforma"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
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
                                <th>Numéro</th>
                                <td>{{ $proforma->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Client</th>
                                <td>{{ $proforma->customer->getName() }}</td>
                            </tr>
                            <tr>
                                <td>TVA</td>
                                <td>{{ $proforma->getVat() }}</td>
                            </tr>
                            <tr>
                                <td>Remise</td>
                                <td>{{ $proforma->getDiscount() }}</td>
                            </tr>
                            <tr>
                                <th>Total HT</th>
                                <td>{{ $proforma->totalHT() }}</td>
                            </tr>
                            <tr>
                                <th>Total TVA</th>
                                <td>{{ $proforma->totalTVA() }}</td>
                            </tr>
                            <tr>
                                <th>Total TTC</th>
                                <td>{{ $proforma->totalTTC() }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $proforma->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $proforma->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-right py-1">
                    <x-create-record routeName="product_proforma.create" />
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>PVG</th>
                                <th>PVU</th>
                                <th>Qté</th>
                                <th>PVHT</th>
                                <th>DC</th>
                                <th>DM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proforma->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->global_selling_price }}</td>
                                    <td>{{ $product->pivot->selling_price }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->selling_price * $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                        <x-show-record routeName="product_proforma.show" :routeParam="$product->pivot->id" />

                                        <x-edit-record routeName="product_proforma.edit" :routeParam="$product->pivot->id" />

                                        <x-destroy-record routeName="product_proforma.destroy" :routeParam="$product->pivot->id" />
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8">Pas d'enregistrements</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection
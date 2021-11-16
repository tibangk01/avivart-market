@extends('layouts.dashboard', ['title' => "Produits & Services"])

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
                                            <x-print-all-record routeName="product.printing.all" />
                                            
                                            <x-create-record routeName="product.create" />
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th></th>
                                                    <th>Nom</th>
                                                    <th>Type</th>
                                                    <th>Unité</th>
                                                    <th>Fournisseur</th>
                                                    <th>PAU</th>
                                                    <th>PVU</th>
                                                    <th>PLU</th>
                                                    <th>Qté en Stock</th>
                                                    <th>Qté Vendue</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td><x-library :library='$product->library' class="img25_25" /></td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->product_type->name }}</td>
                                                    <td>{{ $product->conversion->name }}</td>
                                                    <td>{{ $product->provider->getName() }}</td>
                                                    <td>{{ $product->purchase_price }}</td>
                                                    <td>{{ $product->selling_price }}</td>
                                                    <td>{{ $product->rental_price }}</td>
                                                    <td>{{ $product->stock_quantity }}</td>
                                                    <td>{{ $product->sold_quantity }}</td>
                                                    <td>{{ $product->created_at }}</td>
                                                    <td>{{ $product->updated_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="product.show" :routeParam="$product->id" />
                                                        
                                                        <x-edit-record routeName="product.edit" :routeParam="$product->id" />

                                                        <x-destroy-record routeName="product.destroy" :routeParam="$product->id" />

                                                        <x-print-one-record routeName="product.printing.one" :routeParam="$product->id" />
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="13">Pas d'enregistrements</td>
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

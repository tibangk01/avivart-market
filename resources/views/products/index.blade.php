@extends('layouts.dashboard', ['title' => "Produits & Services"])

@section('body')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active rounded-0" id="nav-first-tab" data-toggle="tab"
                                    href="#nav-first" role="tab" aria-controls="nav-first"
                                    aria-selected="true">Produits</a>

                                <a class="nav-item nav-link rounded-0" id="nav-second-tab" data-toggle="tab"
                                    href="#nav-second" role="tab" aria-controls="nav-second"
                                    aria-selected="true">Services</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-first" role="tabpanel"
                                aria-labelledby="nav-first-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <a class="btn btn-flat btn-primary" href="{{ route('product.create', ['status' => 'product']) }}" title="Ajouter">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-flat btn-dark" target="_blank" href="{{ route('product.printing.all', ['status' => 'products']) }}" title="Imprimer">
                                            <i class="fa fa-print"></i>
                                        </a>
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

                            <div class="tab-pane fade" id="nav-second" role="tabpanel"
                                aria-labelledby="nav-second-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <a class="btn btn-flat btn-primary" href="{{ route('product.create', ['status' => 'service']) }}" title="Ajouter">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-flat btn-dark" target="_blank" href="{{ route('product.printing.all', ['status' => 'services']) }}" title="Imprimer">
                                            <i class="fa fa-print"></i>
                                        </a>
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
                                                <th>PVU</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($services as $product)
                                            <tr>
                                                <td><x-library :library='$product->library' class="img25_25" /></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->product_type->name }}</td>
                                                <td>{{ $product->conversion->name }}</td>
                                                <td>{{ $product->provider->getName() }}</td>
                                                <td>{{ $product->selling_price }}</td>
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
                                            <td colspan="9">Pas d'enregistrements</td>
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
</section>
@endsection

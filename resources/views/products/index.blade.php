@extends('layouts.dashboard', ['title' => "Produits"])

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
                                            <a class="btn btn-flat btn-dark" target="_blank" 
                                                            href="{{ route('product.printing.all') }}"
                                                            title="Imprimer"><i class="fa fa-print"></i> Imprimer</a>

                                            <a class="btn btn-flat btn-primary"
                                                href="{{ route('product.create') }}"><i class="fa fa-plus"></i>
                                                Ajouter</a>
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
                                                    <th>PA</th>
                                                    <th>PV</th>
                                                    <th>PL</th>
                                                    <th>Qté en Stock</th>
                                                    <th>Qté Vendue</th>
                                                    <th>Date d'Insertion</th>
                                                    <th>Date d'Edition</th>
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
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                            href="{{ route('product.show', $product) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('product.edit', $product) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('product.destroy', $product) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-dark btn-xs" target="_blank" 
                                                    href="{{ route('product.printing.one', $product) }}"
                                                    title="Imprimer"><i class="fa fa-print"
                                                        aria-hidden="true"></i></a>
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

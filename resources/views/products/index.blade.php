@extends('layouts.dashboard', ['title' => "Liste des produits"])

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

                                            <a class="btn btn-flat btn-primary mb-1"
                                                href="{{ route('product.create') }}"><i class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap datatable text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Type</th>
                                                    <th>Unité</th>
                                                    <th>Prix d'Achat</th>
                                                    <th>Prix de Vente</th>
                                                    <th>Prix de Location</th>
                                                    <th>Quantité en stock</th>
                                                    <th>Quantité vendue</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @forelse ($products as $product)
                                                        <tr>
                                                            <td>{{ $product->name }}</td>
                                                            <td>{{ $product->product_type->name }}</td>
                                                            <td>{{ $product->conversion->name }}</td>
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
                                                                    title="Afficher"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                                <a class="btn btn-danger btn-xs"
                                                                    href="{{ route('product.destroy', $product) }}"
                                                                    title="Afficher"><i class="fa fa-trash"
                                                                        aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="11">
                                                            Pas d'enregistrements.
                                                        </td>
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

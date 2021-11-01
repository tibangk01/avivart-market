@extends('layouts.dashboard', ['title' => $product->name])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-library :library='$product->library' class="img200_200" />
                    <a href="{{ route('library.edit', $product->library) }}"><i class="fas fa-edit"></i> Editer</a>
                </div>

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
                                    <th>Nom</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre d'Elément</th>
                                    <td>{{ $product->items }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <th>Fournisseur</th>
                                    <td>{{ $product->provider->getName() }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $product->product_type->name }}</td>
                                </tr>
                                <tr>
                                    <th>Catégorie</th>
                                    <td>{{ $product->product_category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Unité</th>
                                    <td>{{ $product->conversion->name }}</td>
                                </tr>
                                <tr>
                                    <th>Prix d'Achat Global</th>
                                    <td>{{ $product->global_purchase_price }}</td>
                                </tr>
                                <tr>
                                    <th>Prix d'Achat Unitaire</th>
                                    <td>{{ $product->purchase_price }}</td>
                                </tr>
                                <tr>
                                    <th>Prix de Vente Global</th>
                                    <td>{{ $product->global_selling_price }}</td>
                                </tr>
                                <tr>
                                    <th>Prix de Vente Unitaire</th>
                                    <td>{{ $product->selling_price }}</td>
                                </tr>
                                <tr>
                                    <th>Prix de Location Global</th>
                                    <td>{{ $product->global_rental_price }}</td>
                                </tr>
                                <tr>
                                    <th>Prix de Location Unitaire</th>
                                    <td>{{ $product->rental_price }}</td>
                                </tr>
                                <tr>
                                    <th>Quantité en Stock</th>
                                    <td>{{ $product->stock_quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Quantité Vendue</th>
                                    <td>{{ $product->sold_quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Quantité d'Alert</th>
                                    <td>{{ $product->alert_quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Numéro de série</th>
                                    <td>{{ $product->serial_number }}</td>
                                </tr>
                                <tr>
                                    <th>Date de fabrication</th>
                                    <td>{{ $product->manufacture_date }}</td>
                                </tr>
                                <tr>
                                    <th>Date d'expiration</th>
                                    <td>{{ $product->expiration_date }}</td>
                                </tr>
                                <tr>
                                    <th>Date de création</th>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Date de modification</th>
                                    <td>{{ $product->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('product.edit', 'Editer', ['product' => $product], ['class' => 'text-warning']) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4>Caractéristiques</h4>
                    <div>
                        {!! nl2br($product->characteristics) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

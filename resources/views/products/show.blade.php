@extends('layouts.dashboard', ['title' => 'Afficher un produit'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-stripped table-hover mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Clé</th>
                                    <th>Valeur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nom</td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{ $product->product_type->name }}</td>
                                </tr>
                                <tr>
                                    <td>Catégorie</td>
                                    <td>{{ $product->product_category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Unité</td>
                                    <td>{{ $product->conversion->name }}</td>
                                </tr>
                                <tr>
                                    <td>Devise</td>
                                    <td>{{ $product->currency->name }}</td>
                                </tr>
                                <tr>
                                    <td>Prix unitaire</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>Quantité en stock</td>
                                    <td>{{ $product->stock_quantity }}</td>
                                </tr>
                                <tr>
                                    <td>Quantité vendue</td>
                                    <td>{{ $product->sold_quantity }}</td>
                                </tr>
                                <tr>
                                    <td>Numéro de série</td>
                                    <td>{{ $product->serial_number ? $product->serial_number : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Date de fabrication</td>
                                    <td>{{ $product->manufacture_date ? $product->manufacture_date : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Date d'expiration</td>
                                    <td>{{ $product->expiration_date ? $product->expiration_date  : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $product->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de modification</td>
                                    <td>{{ $product->updated_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                        <img src="{{ $product->library->remote }}" width="50" height="50"
                                            alt="{{ $product->name }}">
                                        <a href="{{ route('library.edit', ['library' => $product->library]) }}"
                                            class="btn btn-sm btn-info" title="Editer"><i class="fas fa-edit"></i></a>
                                    </td>
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
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.dashboard', ['title' => 'Liste des produits'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="ml-auto p-2">
                    <a class="btn btn-flat btn-primary" href="{{ route('product.create') }}"><i class="fa fa-plus"></i>
                        Ajouter</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Catégorie</th>
                                        <th>Qtté en stock</th>
                                        <th>Qtté vendu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->count() > 0)
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->product_category->name }}</td>
                                                <td>{{ $product->stock_quantity }}</td>
                                                <td>{{ $product->sold_quantity }}</td>
                                                <td>
                                                    {!! link_to_route('product.show', 'Afficher', ['product' => $product], ['class' => 'btn ']) !!}
                                                    {!! link_to_route('product.edit', 'Modifier', ['product' => $product], ['class' => 'btn ']) !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                Pas d'enregistrment de produit(s).
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

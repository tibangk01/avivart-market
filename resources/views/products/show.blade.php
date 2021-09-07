@extends('layouts.dashboard', ['title' => 'Afficher un produit'])

@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="p-0"> <a class="btn btn-flat btn-primary"
                                        href="{{ route('product.index') }}">Retour</a> </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 450px;">
                            <table class="table table-head-fixed text-nowrap">
                                <tr>
                                    <td>Id</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nom</td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <td>Quatitée en stock</td>
                                    <td>{{ $product->stock_quantity }}</td>
                                </tr>
                                <tr>
                                    <td>Quantitée vendue</td>
                                    <td>{{ $product->sold_quantity }}</td>
                                </tr>
                                <tr>
                                    <td>Prix Unitaire</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>Catégorie</td>
                                    <td>{{ $product->product_category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Dévise</td>
                                    <td>{{ $product->currency->name }}</td>
                                </tr>
                                <tr>
                                    <td>Conversion</td>
                                    <td>{{ $product->conversion->name }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                        <img src="{{ $product->library->remote }}" width="50" height="50" alt="{{ $product->name }}">
                                        <a href="{{ route('library.edit', ['library' => $product->library ]) }}" class="btn btn-sm btn-info" title="Editer"><i class="fas fa-edit"></i></a>
                                    </td>
                                <tr/>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
@endsection

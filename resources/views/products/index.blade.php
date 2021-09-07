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
                        <div class="card-header">
                            <h3 class="card-title">Liste des produits</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap" id="example"
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Catégorie</th>
                                        <th>Qtté en stock</th>
                                        <th>Qtté vendu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->count())
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
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
                                            <td colspan="8" class="text-center">
                                                Pas d'enregistrment de produit(s).
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
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

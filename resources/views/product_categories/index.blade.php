@extends('layouts.dashboard', ['title' => "Catégories de produit"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Listes</a>
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
                                            href="{{ route('product_category.create') }}"><i class="fa fa-plus"></i>
                                            Ajouter</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Rayon</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Nombre de Produits</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($productCategories as $productCategory)
                                                <tr>
                                                    <td>{{ $productCategory->name }}</td>
                                                    <td>{{ $productCategory->product_ray->name }}</td>
                                                    <td>{{ $productCategory->created_at }}</td>
                                                    <td>{{ $productCategory->created_at }}</td>
                                                    <td>{{ $productCategory->products->count() }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                            href="{{ route('product_category.show', $productCategory) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('product_category.edit', $productCategory) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('product_category.destroy', $productCategory) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">Pas d'enregistrements</td>
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

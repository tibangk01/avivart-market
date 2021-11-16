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
                                    <div class="ml-auto mb-1">
                                        <x-create-record routeName="product_category.create" />
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
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="product_category.show" :routeParam="$productCategory->id" />
                                                        
                                                        <x-edit-record routeName="product_category.edit" :routeParam="$productCategory->id" />

                                                        <x-destroy-record routeName="product_category.destroy" :routeParam="$productCategory->id" />
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

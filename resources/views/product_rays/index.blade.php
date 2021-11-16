@extends('layouts.dashboard', ['title' => "Rayons de produit"])

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
                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Listes</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <x-create-record routeName="product_ray.create" />
                                    </div>
                                </div>

                                <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Nombre de Catégories</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($productRays as $productRay)
                                                    <tr>
                                                        <td>{{ $productRay->name }}</td>
                                                        <td>{{ $productRay->created_at }}</td>
                                                        <td>{{ $productRay->updated_at }}</td>
                                                        <td>{{ $productRay->product_categories->count() }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="product_ray.show" :routeParam="$productRay->id" />
                                                            
                                                            <x-edit-record routeName="product_ray.edit" :routeParam="$productRay->id" />

                                                            <x-destroy-record routeName="product_ray.destroy" :routeParam="$productRay->id" />
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">Pas d'enregistrements</td>
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

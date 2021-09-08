@extends('layouts.dashboard', ['title' => "Détails du type de produit"])

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
                                <th>Nom</th>
                                <td>{{ $productType->name }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $productType->created_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $productType->updated_at->diffForHumans() }}</td>
                            </tr>
                            <tr class="table-light">
                                <th>Action</th>
                                <td>
                                    {!! link_to_route('product_type.edit','Editer', ['product_type' => $productType], ['class' => 'text-warning'] ) !!}
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

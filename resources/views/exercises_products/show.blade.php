 @extends('layouts.dashboard', ['title' => "Exercice & Produit"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
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
                                <th>Exercice</th>
                                <td>{{ $exerciseProduct->exercise->getPeriod() }}</td>
                            </tr>
                            <tr>
                                <th>Produit</th>
                                <td>{{ $exerciseProduct->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Stock Initial</th>
                                <td>{{ $exerciseProduct->initial_stock }}</td>
                            </tr>
                            <tr>
                                <th>Stock Final</th>
                                <td>{{ $exerciseProduct->final_stock }}</td>
                            </tr>
                            <tr>
                                <th>Prix d'Achat Global</th>
                                <td>{{ $exerciseProduct->global_purchase_price }}</td>
                            </tr>
                            <tr>
                                <th>Prix d'Achat Unitaire</th>
                                <td>{{ $exerciseProduct->purchase_price }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente Global</th>
                                <td>{{ $exerciseProduct->global_selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente Unitaire</th>
                                <td>{{ $exerciseProduct->selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Location Global</th>
                                <td>{{ $exerciseProduct->global_rental_price }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Location Unitaire</th>
                                <td>{{ $exerciseProduct->rental_price }}</td>
                            </tr>
                            <tr>
                                <th>Perte</th>
                                <td>{{ $exerciseProduct->loss }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $exerciseProduct->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mis à jour</th>
                                <td>{{ $exerciseProduct->updated_at }}</td>
                            </tr>
                            <tr class="table-light">
                                <th>Action</th>
                                <td>
                                    {!! link_to_route('exercise_product.edit', 'Editer', ['exercise_product' => $exerciseProduct], ['class' => 'text-warning']) !!}
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
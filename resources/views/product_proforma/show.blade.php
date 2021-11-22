 @extends('layouts.dashboard', ['title' => "Affichage"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
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
                                <th>Produit</th>
                                <td>{{ $productProforma->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente Global</th>
                                <td>{{ $productProforma->global_selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente Unitaire</th>
                                <td>{{ $productProforma->selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Quantité</th>
                                <td>{{ $productProforma->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente HT</th>
                                <td>{{ $productProforma->selling_price * $productProforma->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $productProforma->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modififaction</th>
                                <td>{{ $productProforma->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>  
</section>
@endsection
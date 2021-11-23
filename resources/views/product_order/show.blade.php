 @extends('layouts.dashboard', ['title' => "Affichage"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clé</th>
                                <th>Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Produit</th>
                                <td>{{ $productOrder->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente Global</th>
                                <td>{{ $productOrder->global_selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente Unitaire</th>
                                <td>{{ $productOrder->selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Quantité</th>
                                <td>{{ $productOrder->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Prix de Vente HT</th>
                                <td>{{ $productOrder->selling_price * $productOrder->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $productOrder->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modififaction</th>
                                <td>{{ $productOrder->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>  
</section>
@endsection
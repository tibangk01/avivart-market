 @extends('layouts.dashboard', ['title' => "Approvisionnements"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                <th>Numéro</th>
                                <td>{{ $supply->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Produit</th>
                                <td>{{ $supply->product_purchase->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Bon de commande</th>
                                <td>{{ $supply->product_purchase->purchase->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Quantité</th>
                                <td>{{ $supply->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $supply->created_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $supply->updated_at->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection
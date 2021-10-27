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
                                <td>{{ $productPurchase->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Quantité Commandée</th>
                                <td>{{ $productPurchase->ordered_quantity }}</td>
                            </tr>
                            <tr>
                                <th>Quantité Livrée</th>
                                <td>{{ $productPurchase->delivered_quantity }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $productPurchase->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de modififaction</th>
                                <td>{{ $productPurchase->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>  
</section>
@endsection
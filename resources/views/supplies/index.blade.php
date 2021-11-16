 @extends('layouts.dashboard', ['title' => "Approvisionnements"])

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
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <x-create-record routeName="supply.create" />
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Commande fournisseur</th>
                                                <th>Produit</th>
                                                <th>Quantité</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($supplies as $supply)
                                                <tr>
                                                    <td>{{ $supply->getNumber() }}</td>
                                                    <td>{{ $supply->product_purchase->purchase->getNumber() }}</td>
                                                    <td>{{ $supply->product_purchase->product->name }}</td>
                                                    <td>{{ $supply->quantity }}</td>
                                                    <td>{{ $supply->created_at }}</td>
                                                    <td>{{ $supply->updated_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="supply.show" :routeParam="$supply->id" />

                                                        @if($supply->product_purchase->ordered_quantity != $supply->product_purchase->delivered_quantity)
                                                        <x-edit-record routeName="supply.edit" :routeParam="$supply->id" />

                                                        <x-destroy-record routeName="supply.destroy" :routeParam="$supply->id" />
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7">Pas d'enregistrements.</td>
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
 @extends('layouts.dashboard', ['title' => "Liste des approvisionnements"])

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
                                    <div class="ml-auto">

                                        <a class="btn btn-flat btn-primary mb-1"
                                            href="{{ route('supply.create') }}"><i class="fa fa-plus"></i>
                                            Ajouter</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap datatable text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Bon de commande</th>
                                                <th>Produit</th>
                                                <th>Quantité</th>
                                                <th>Date de Création</th>
                                                <th>Date de modification</th>
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
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                            href="{{ route('supply.show', $supply) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>

                                                        @if($supply->product_purchase->ordered_quantity != $supply->product_purchase->delivered_quantity)
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('supply.edit', $supply) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('supply.destroy', $supply) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
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
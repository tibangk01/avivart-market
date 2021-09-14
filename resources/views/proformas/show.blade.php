 @extends('layouts.dashboard', ['title' => "Proforma et sa liste de produits"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
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
                                <td>{{ $proforma->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Client</th>
                                <td>{{ $proforma->customer->getName() }}</td>
                            </tr>
                            <tr>
                                <th>TVA</th>
                                <td>{{ $proforma->vat->percentage }}</td>
                            </tr>
                            <tr>
                                <th>Remise</th>
                                <td>{{ $proforma->discount->amount }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $proforma->created_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $proforma->updated_at->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap datatable text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>Qté</th>
                                <th>DC</th>
                                <th>DJ</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proforma->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->created_at->diffForHumans() }}</td>
                                    <td>{{ $product->pivot->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs"
                                            href="{{ route('product_proforma.show', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('product_proforma.destroy', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    Pas d'enregistrements.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection
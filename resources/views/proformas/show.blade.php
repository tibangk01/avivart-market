 @extends('layouts.dashboard', ['title' => "Proforma"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
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
                                <th>Numéro</th>
                                <td>{{ $proforma->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Client</th>
                                <td>{{ $proforma->customer->getName() }}</td>
                            </tr>
                            <tr>
                                <td>TVA</td>
                                <td>{{ $proforma->getVat() }}</td>
                            </tr>
                            <tr>
                                <td>Remise</td>
                                <td>{{ $proforma->getDiscount() }}</td>
                            </tr>
                            <tr>
                                <th>Total HT</th>
                                <td>{{ $proforma->totalHT() }}</td>
                            </tr>
                            <tr>
                                <th>Total TVA</th>
                                <td>{{ $proforma->totalTVA() }}</td>
                            </tr>
                            <tr>
                                <th>Total TTC</th>
                                <td>{{ $proforma->totalTTC() }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $proforma->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $proforma->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-right py-1">
                    <a class="btn btn-flat btn-primary" href="{{ route('product_proforma.create') }}">
                        <i class="fa fa-plus"></i> Ajouter
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-nowrap datatable text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>Qté</th>
                                <th>DC</th>
                                <th>DM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proforma->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs"
                                            href="{{ route('product_proforma.show', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-warning btn-xs"
                                            href="{{ route('product_proforma.edit', $product->pivot->id) }}"
                                            title="Editer"><i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('product_proforma.destroy', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>
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
</section>
@endsection
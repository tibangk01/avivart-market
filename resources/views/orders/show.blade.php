 @extends('layouts.dashboard', ['title' => "Commande et sa liste de produits"])

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
                            <tr class="{{ $order->getBgColor() }}">
                                <th>Payement</th>
                                <td>{{ $order->paid ? 'Oui' : 'Non' }}</td>
                            </tr>
                            <tr>
                                <th>Numéro</th>
                                <td>{{ $order->getNumber() }}</td>
                            </tr>
                            <tr>
                                <th>Client</th>
                                <td>{{ $order->customer->getName() }}</td>
                            </tr>
                            <tr>
                                <th>Etat</th>
                                <td>{{ $order->order_state->name }}</td>
                            </tr>
                            <tr>
                                <th>TVA</th>
                                <td>{{ $order->vat->percentage }}</td>
                            </tr>
                            <tr>
                                <th>Remise</th>
                                <td>{{ $order->discount->amount }}</td>
                            </tr>
                            <tr>
                                <th>Total HT</th>
                                <td>{{ $order->totalHT() }}</td>
                            </tr>
                            <tr>
                                <th>Total TVA</th>
                                <td>{{ $order->totalTVA() }}</td>
                            </tr>
                            <tr>
                                <th>Total TTC</th>
                                <td>{{ $order->totalTTC() }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $order->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-right py-1">
                    <a class="btn btn-flat btn-primary" href="{{ route('product_order.create') }}">
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
                                <th>DJ</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>{{ $product->pivot->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs"
                                            href="{{ route('product_order.show', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>

                                        @if(!$order->paid)
                                        <a class="btn btn-warning btn-xs"
                                            href="{{ route('product_order.edit', $product->pivot->id) }}"
                                            title="Editer"><i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('product_order.destroy', $product->pivot->id) }}"
                                            title="Afficher"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>
                                        @endif
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
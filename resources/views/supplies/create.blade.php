 @extends('layouts.dashboard', ['title' => "Ajout d'un approvisionnement"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if($purchases->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap datatable text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Unité</th>
                                <th>Prix d'Achat</th>
                                <th>Prix de Vente</th>
                                <th>Prix de Location</th>
                                <th>Qté en stock</th>
                                <th>Qté vendue</th>
                                <th>Date de Créat</th>
                                <th>Date de modif</th>
                                <th>Qté Cmdée</th>
                                <th>Qté Livrée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                            <tr class="table-primary">
                                <th colspan="13">Bon de commande N° {{ $purchase->getNumber() }} addressé au Fournisseur {{ $purchase->provider->getName() }}</th>
                            </tr>

                            @forelse($purchase->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->product_type->name }}</td>
                                <td>{{ $product->conversion->name }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->rental_price }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->sold_quantity }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>{{ $product->pivot->ordered_quantity }}</td>
                                <td>{{ $product->pivot->delivered_quantity }}</td>
                                <td>
                                    @if(($product->pivot->ordered_quantity - $product->pivot->delivered_quantity) == 0)
                                    <strong class="badge badge-success">Approvisionnement terminé</strong>
                                    @else
                                    {!! Form::open(['route' => 'supply.store']) !!}
                                    <input type="hidden" name="product_purchase_id" value="{{ $product->pivot->id }}">
                                    <div class="input-group">
                                        <input type="number" name="delivered_quantity" id="delivered_quantity" class="form-control"
                                            placeholder="Quantité livrée" value="{{ $product->pivot->ordered_quantity - $product->pivot->delivered_quantity }}" required min="1" step="1">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-dark">Valider</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13">Pas de produit</td>
                            </tr>
                            @endforelse

                            @empty
                            <tr>
                                <td colspan="13">Pas d'enregistrements</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @else
                @endif
            </div>
        </div>
    </div>  
</section>
@endsection
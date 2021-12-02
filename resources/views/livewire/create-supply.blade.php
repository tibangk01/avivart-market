<section>
    <div wire:loading>
        Veuillez patienter...
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Unité</th>
                    <th>Qté en Stock</th>
                    <th>Qté Vendue</th>
                    <th>PAG</th>
                    <th>PAU</th>
                    <th>Qté Cmdée</th>
                    <th>Qté Livrée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchases as $purchase)
                <tr class="table-info text-center">
                    <th colspan="8">Commande fournisseur N° {{ $purchase->getNumber() }} adressée à {{ $purchase->provider->getName() }}</th>
                    <td>Nombre de Produits ({{ $purchase->products->count() }})</td>
                    <td>
                        @if(!$purchase->supplyIsCompleted())
                        <a class="badge  badge-warning" href="{{ route('supply.create', ['purchaseId' => $purchase->id]) }}">Tout livrer</a>
                        @endif
                    </td>
                </tr>

                    @forelse($purchase->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->product_type->name }}</td>
                        <td>{{ $product->conversion->name }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ $product->sold_quantity }}</td>
                        <td>{{ $product->pivot->global_purchase_price }}</td>
                        <td>{{ $product->pivot->purchase_price }}</td>
                        <td>{{ $product->pivot->ordered_quantity }}</td>
                        <td>{{ $product->pivot->delivered_quantity }}</td>
                        <td>
                            @if($product->pivot->ordered_quantity == $product->pivot->delivered_quantity)
                            <strong class="badge badge-success">Approvisionnement terminé</strong>
                            @else
                            {!! Form::open(['route' => 'supply.store']) !!}
                            <input type="hidden" name="product_purchase_id" value="{{ $product->pivot->id }}">
                            <div class="input-group">
                                <input type="number" name="delivered_quantity" id="delivered_quantity" class="form-control"
                                    placeholder="Quantité livrée" value="{{ $product->pivot->ordered_quantity - $product->pivot->delivered_quantity }}" required min="1" step="1" wire:keydown.enter.prevent="updateQuantity({{ $product->pivot->id }}, $event.target.value)">
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
                        <td colspan="10">Pas de produit</td>
                    </tr>
                    @endforelse

                @empty
                <tr>
                    <td colspan="10">Pas d'enregistrements</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
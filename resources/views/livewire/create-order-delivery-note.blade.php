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
                    <th>PVG</th>
                    <th>PVU</th>
                    <th>PLG</th>
                    <th>PLU</th>
                    <th>Qté Cmdée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr class="table-primary text-center">
                    <th colspan="9">Commande client N° {{ $order->getNumber() }} adressée à {{ $order->customer->getName() }}</th>
                    <td>Nombre de Produits ({{ $order->products->count() }})</td>
                    <td>
                        @if($order->has_delivery_note)
                        <strong class="badge badge-info">Fichier attaché</strong>
                        @else
                        <a class="badge badge-warning" href="{{ route('library.create', array('order' => $order->id)) }}">Attacher un fichier</a>
                        @endif
                    </td>
                </tr>

                    @forelse($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->product_type->name }}</td>
                        <td>{{ $product->conversion->name }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ $product->sold_quantity }}</td>
                        <td>{{ $product->pivot->global_selling_price }}</td>
                        <td>{{ $product->pivot->selling_price }}</td>
                        <td>{{ $product->pivot->global_rental_price }}</td>
                        <td>{{ $product->pivot->rental_price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>
                            @if(!is_null($product->pivot->comment))
                            <strong class="badge badge-success">{{ $product->pivot->comment }}</strong>
                            @else
                            {!! Form::open(['route' => 'order_delivery_note.store']) !!}
                            <input type="hidden" name="product_order_id" value="{{ $product->pivot->id }}">
                            <div class="input-group">
                                <input type="text" name="comment" id="comment" class="form-control"
                                    placeholder="Commentaire" value="{{ $product->pivot->comment }}" wire:keydown.enter.prevent="updateComment({{ $product->pivot->id }}, $event.target.value)">
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
                        <td colspan="11">Pas de produit</td>
                    </tr>
                    @endforelse

                @empty
                <tr>
                    <td colspan="11">Pas d'enregistrements</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
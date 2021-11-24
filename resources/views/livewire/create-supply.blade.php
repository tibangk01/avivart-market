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

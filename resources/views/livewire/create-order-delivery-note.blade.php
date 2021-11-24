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

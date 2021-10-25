<div>
    {!! Form::open(['method' => 'POST', 'route' => 'purchase_payment.store']) !!}

    <div class="form-group">
        <label for="purchase_id">Choisissez un bon de commande</label>
        <select class="form-control" name="purchase_id" id="purchase_id" required wire:change="setAmount($event.target.value)">
            @foreach($purchases as $purchase)
            <option value="{{ $purchase->id }}">{{ $purchase->getNumber() }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="amount">Montant</label>
        <input type="number" class="form-control" name="amount" id="amount" wire:model="amount" readonly required step="any">
    </div>

     <div class="form-group text-right">
        {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
</div>

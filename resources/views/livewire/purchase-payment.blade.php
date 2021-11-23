<div x-data="{ state: true }">

    <div wire:loading>
        Veuillez patienter...
    </div>

    {!! Form::open(['method' => 'POST', 'route' => 'purchase_payment.store']) !!}

    <div class="form-group">
        <label for="purchase_id">Commande fournisseur</label>
        <select class="form-control" name="purchase_id" id="purchase_id" required wire:change="setAmount($event.target.value)">
            <option value="0">Choisissez</option>
            @foreach($purchases as $purchase)
            <option value="{{ $purchase->id }}">{{ $purchase->getNumber() }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="amount">Montant</label>
        <input type="number" class="form-control" name="amount" id="amount" wire:model="amount" x-bind:readonly="state" required step="any">
    </div>

    <div class="form-group">
        <label for="state" x-text="state ? 'Payement total' : 'Payement partiel'"></label>
        <input type="checkbox" name="state" id="state" x-model="state">
    </div>

    <div class="form-group">
        <label for="payment_mode_id">Mode de règlement</label>
        <select required class="form-control" id="payment_mode_id" name="payment_mode_id">
            <option value="">Choisissez</option>
            @foreach($paymentModes as $paymentMode)
            <option value="{{ $paymentMode->id }}">{{ $paymentMode->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="account_number">N° de compte</label>
        <input type="text" name="account_number" id="account_number" placeholder="N° de compte" class="form-control">
    </div>

    <div class="form-group text-right">
        {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
</div>

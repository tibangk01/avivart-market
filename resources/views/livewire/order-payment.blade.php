<div x-data="{ state: true }">

    <div wire:loading>
        Veuillez patienter...
    </div>

    {!! Form::open(['method' => 'POST', 'route' => 'order_payment.store']) !!}

    <div class="form-group">
        <label for="order_id">Commande client</label>
        <select class="form-control" name="order_id" id="order_id" required wire:change="setAmount($event.target.value)">
            <option value="0">Choisissez</option>
            @foreach($orders as $order)
            <option value="{{ $order->id }}">{{ $order->getNumber() }}</option>
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
        <label for="order_state_id">Etat</label>
        <select required class="form-control" id="order_state_id" name="order_state_id">
            <option value="">Choisissez</option>
            @foreach($orderStates as $orderState)
            <option value="{{ $orderState->id }}">{{ $orderState->name }}</option>
            @endforeach
        </select>
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
        <label for="cheque_number">N° de chèque</label>
        <input type="text" name="cheque_number" id="cheque_number" placeholder="N° de chèque" class="form-control">
    </div>

    <div class="form-group text-right">
        {!! Form::submit('Ajouter', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
</div>

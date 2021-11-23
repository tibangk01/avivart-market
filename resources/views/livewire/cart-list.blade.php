@php($subtotal = 0)

<section>
    @if($rows->count())

    <div wire:loading>
        Veuillez patienter...
    </div>

    <div class="table-responsive bg-white p-2">
        <table class="mb-0 table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Produit</th>
                    <th>PAU</th>
                    <th>PVU</th>
                    <th>Qté à Commandée</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    <td>{{ $row->model->name }}</td>
                    <td>{{ $row->model->purchase_price }}</td>
                    <td>{{ $row->model->selling_price }}</td>
                    <td>
                        <form method="get" action="{{ route('cart.update', ['row' => $row->rowId]) }}" accept-charset="utf-8" autocomplete="off">
                            <input type="hidden" name="instance" value="{{ $instance }}">
                            <div class="input-group">
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    placeholder="Quantité" value="{{ $row->qty }}" required min="1" step="1" wire:keydown.enter.prevent="updateQuantity({{ $row->id }}, $event.target.value)">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-dark">Valider</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        @if ($instance == 'purchase')
                            @php($subtotal += $row->model->purchase_price * $row->qty)
                            {{ $row->model->purchase_price * $row->qty }}
                        @elseif (in_array($instance, ['proforma', 'order']))
                            @php($subtotal += $row->model->selling_price * $row->qty)
                            {{ $row->model->selling_price * $row->qty }}
                        @else
                            {{ $row->subtotal }}
                        @endif
                    </td>
                    <td>
                        <a wire:click.prevent="removeProduct({{ $row->id }})" data-toggle="tooltip" title="Retirer du panier" href="{{ route('cart.remove', ['row' => $row->rowId, 'instance' => $instance]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th colspan="5">{{ $subtotal }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <p class="my-2 text-right">
        <a wire:click.prevent="$refresh" href="" class="btn btn-default"><i class="fa fa-spinner mr-2"></i> Actualiser le panier</a>
        <a wire:click.prevent="truncate()" href="{{ route('cart.truncate', ['instance' => $instance]) }}" class="btn btn-danger"><i class="fa fa-eraser mr-2"></i> Vider le panier</a>
    </p>

    {!! Form::open(['route' => $routeName]) !!}
    <input type="hidden" name="instance" value="{{ $instance }}">

    @if ($instance == 'purchase')

    <div class="form-group">
        <label for="provider_id">Fournisseur</label>
        <select required class="form-control" id="provider_id" name="provider_id">
            <option value="">Choisissez</option>
            @foreach($providers as $provider)
            <option value="{{ $provider->id }}">{{ $provider->getName() }}</option>
            @endforeach
        </select>
    </div>

    @elseif ($instance == 'proforma')

    <div class="form-group">
        <label for="customer_id">Client</label>
        <select required class="form-control" id="customer_id" name="customer_id">
            <option value="">Choisissez</option>
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->getName() }}</option>
            @endforeach
        </select>
    </div>

     @elseif ($instance == 'order')

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
        <label for="customer_id">Client</label>
        <select required class="form-control" id="customer_id" name="customer_id">
            <option value="">Choisissez</option>
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}" {{ session()->has('loadedProforma') ? session('loadedProforma')->customer_id : null }}>{{ $customer->getName() }}</option>
            @endforeach
        </select>
    </div>

    @endif

    <div class="form-group">
        <label for="vat_id">TVA</label>
        <select class="form-control" id="vat_id" name="vat_id">
            <option value="">Choisissez</option>
            @foreach($vats as $vat)
            <option value="{{ $vat->id }}" {{ session()->has('loadedProforma') ? session('loadedProforma')->vat_id : null }}>{{ $vat->percentage }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="discount_id">Remise</label>
        <select class="form-control" id="discount_id" name="discount_id">
            <option value="">Choisissez</option>
            @foreach($discounts as $discount)
            <option value="{{ $discount->id }}" {{ session()->has('loadedProforma') ? session('loadedProforma')->discount_id : null }}>{{ $discount->amount }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group text-right">
        <button type="submit" class="btn btn-success">Valider le panier</button>
    </div>
    {!! Form::close() !!}

    @else

    <h6 class="text-secondary">Aucun produit dans le panier</h6>

    @endif
</section>
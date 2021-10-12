<div class="">
    @php($subtotal = 0)

    @if(Cart::instance($instance)->count())

    <div class="table-responsive bg-white p-2">
        <table class="mb-0 table table-bordered table-hover text-nowrap datatable text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Produit</th>
                    <th>Prix d'Achat</th>
                    <th>Prix de Vente</th>
                    <th>Prix de Location</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::instance($instance)->content() as $row)
                <tr>
                    <td>{{ $row->model->name }}</td>
                    <td>{{ $row->model->purchase_price }}</td>
                    <td>{{ $row->model->selling_price }}</td>
                    <td>{{ $row->model->rental_price }}</td>
                    <td>
                        <form method="get" action="{{ route('cart.update', ['row' => $row->rowId]) }}" accept-charset="utf-8" autocomplete="off">
                            <input type="hidden" name="instance" value="{{ $instance }}">
                            <div class="input-group">
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    placeholder="Quantité" value="{{ $row->qty }}" required min="1" step="1">
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
                        <a data-toggle="tooltip" title="Retirer du panier" href="{{ route('cart.remove', ['row' => $row->rowId, 'instance' => $instance]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th colspan="6">{{ $subtotal }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <p class="my-2 text-right">
        <a href="{{ route('cart.truncate', ['instance' => $instance]) }}" class="btn btn-danger">Vider le panier</a>
    </p>

    {!! Form::open(['route' => $routeName]) !!}
    <input type="hidden" name="instance" value="{{ $instance }}">

    @if ($instance == 'purchase')

    <div class="form-group">
        <label for="provider_id">Fournisseur</label>
        <select required class="form-control" id="provider_id" name="provider_id">
            <option value="">Choisissez un fournisseur</option>
            @foreach($providers as $provider)
            <option value="{{ $provider->id }}">{{ $provider->getName() }}</option>
            @endforeach
        </select>
    </div>

    @elseif ($instance == 'proforma')

    <div class="form-group">
        <label for="customer_id">Client</label>
        <select required class="form-control" id="customer_id" name="customer_id">
            <option value="">Choisissez un client</option>
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->getName() }}</option>
            @endforeach
        </select>
    </div>

     @elseif ($instance == 'order')

     <div class="form-group">
        <label for="order_state_id">Etat</label>
        <select required class="form-control" id="order_state_id" name="order_state_id">
            <option value="">Choisissez un état</option>
            @foreach($orderStates as $orderState)
            <option value="{{ $orderState->id }}">{{ $orderState->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="customer_id">Client</label>
        <select required class="form-control" id="customer_id" name="customer_id">
            <option value="">Choisissez un client</option>
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}" {{ (session()->has('loadedProforma') && (session('loadedProforma')->customer_id == $customer->id)) ? 'selected' : '' }}>{{ $customer->getName() }}</option>
            @endforeach
        </select>
    </div>

    @endif

    <div class="form-group">
        {!! Form::label('vat_id', 'TVA') !!}
        {!! Form::select('vat_id', $vats, session()->has('loadedProforma') ? session('loadedProforma')->vat_id : null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une TVA']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('discount_id', 'Remise') !!}
        {!! Form::select('discount_id', $discounts, session()->has('loadedProforma') ? session('loadedProforma')->discount_id : null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une remise']) !!}
    </div>

    <div class="form-group text-right">
        <button type="submit" class="btn btn-success">Valider le panier</button>
    </div>
    {!! Form::close() !!}

    @else

    <p>Aucun produit dans le panier</p>

    @endif
</div>
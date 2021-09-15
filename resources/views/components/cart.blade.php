<div class="">
    @if(Cart::instance($instance)->count())

    <div class="table-responsive bg-white p-2">
        <table class="mb-0 table table-bordered table-hover text-nowrap datatable text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::instance($instance)->content() as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->price }}</td>
                    <td>
                        <form method="get" action="{{ route('cart.update', ['row' => $row->rowId]) }}" accept-charset="utf-8" autocomplete="off">
                            <input type="hidden" name="instance" value="{{ $instance }}">
                            <div class="input-group">
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    placeholder="Quantité" value="{{ $row->qty }}" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-dark">Valider</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>{{ $row->subtotal }}</td>
                    <td>
                        <a data-toggle="tooltip" title="Retirer du panier" href="{{ route('cart.remove', ['row' => $row->rowId, 'instance' => $instance]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h6 class="mt-3">Détails du panier</h6>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-stripped table-hover mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>Clé</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Sous Total</th>
                    <td>{{ Cart::instance($instance)->subtotal() }}</td>
                </tr>
                <tr>
                    <th>Taxe</th>
                    <td>{{ Cart::instance($instance)->tax() }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ Cart::instance($instance)->total() }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="my-2 text-right">
        <a href="{{ route('cart.truncate', ['instance' => $instance]) }}" class="btn btn-warning">Vider le panier</a>
    </p>

    {!! Form::open(['route' => 'cart.checkout']) !!}
    <input type="hidden" name="instance" value="{{ $instance }}">

    <div class="form-group">
        <label for="provider_id">Fournisseur</label>
        <select required class="form-control" id="provider_id" name="provider_id">
            <option value="">Choisissez un fournisseur</option>
            @forelse($providers as $provider)
            <option value="{{ $provider->id }}">{{ $provider->getName() }}</option>
            @empty
            
            @endforelse
        </select>
    </div>

    <div class="form-group">
        <label for="customer_id">Client</label>
        <select required class="form-control" id="customer_id" name="customer_id">
            <option value="">Choisissez un client</option>
            @forelse($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->getName() }}</option>
            @empty
            
            @endforelse
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('vat_id', 'TVA') !!}
        {!! Form::select('vat_id', $vats, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une TVA']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('discount_id', 'Remise') !!}
        {!! Form::select('discount_id', $discounts, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez une remise']) !!}
    </div>

    <div class="form-group text-right">
        <button type="submit" class="btn btn-success">Valider le panier</button>
    </div>
    {!! Form::close() !!}

    @else

    <p>Aucun produit dans le panier</p>

    @endif
</div>
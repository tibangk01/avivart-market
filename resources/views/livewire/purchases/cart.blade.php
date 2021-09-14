<div class="">
    @if(Cart::instance('purchaseCart')->count())

    <div class="table-responsive bg-white p-2">
        <table class="mb-0 table table-bordered table-hover text-nowrap datatable text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartContent as $row)
                <tr>
                    <td><img src="{{ $row->model->library->remote }}" alt="{{ $row->model->library->description }}" width="48" height="48"></td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->price }}</td>
                    <td>
                        <form method="post" wire:submit.prevent="update({{ $row->rowId }})" accept-charset="utf-8" autocomplete="off">
                            @csrf
                            <div class="input-group">
                                <input type="number" class="form-control" wire:model.defer="quantity"
                                    placeholder="Quantité" value="{{ $row->qty }}" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-dark">Valider</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>{{ $row->subtotal }}</td>
                    <td>
                        <a data-toggle="tooltip" title="Retirer du panier" href="#" 
                            wire:click.prevent="remove({{ $row->rowId }})" class="text-danger"><i class="fa fa-trash"></i></a>
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
                    <td>{{ Cart::instance('purchaseCart')->subtotal() }}</td>
                </tr>
                <tr>
                    <th>Taxe</th>
                    <td>{{ Cart::instance('purchaseCart')->tax() }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ Cart::instance('purchaseCart')->total() }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="my-2 text-right">
        <a href="#" wire:click.prevent="checkout" class="btn btn-success">Valider le panier</a>

        <a href="#" wire:click.prevent="truncate" class="btn btn-warning">Vider le panier</a>
    </p>

    @else

    <p>Aucun produit dans le panier</p>

    @endif
</div>

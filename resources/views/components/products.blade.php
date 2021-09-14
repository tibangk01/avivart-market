<div class="">
    <div class="table-responsive bg-white p-2">
        <table class="mb-0 table table-bordered table-hover text-nowrap datatable text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>PU</th>
                    <th>Qté en Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <a wire:click.prevent="addToCart({{ $product->id }})" class="btn btn-success btn-xs" href="#" title="Ajouter au panier"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Pas d'enregistrements</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
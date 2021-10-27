<div class="">
    <div class="table-responsive bg-white p-2">
        <table class="mb-0 table table-bordered table-hover table-striped text-nowrap datatable text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prix d'Achat</th>
                    <th>Prix de Vente</th>
                    <th>Prix de Location</th>
                    <th>Qté en Stock</th>
                    <th>Qté Vendue</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->rental_price }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>{{ $product->sold_quantity }}</td>
                    <td>
                        <a class="btn btn-success btn-xs" href="{{ route('cart.add', ['product' => $product->id, 'instance' => $instance]) }}" title="Ajouter au panier"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
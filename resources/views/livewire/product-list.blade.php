<section>
    <div class="row">
        <div class="col-md-9">
            <h4>Sélection : {{ count($ids) }}</h4>
        </div>
        <div class="col-md-3">
            <input type="search" name="search" id="search" class="form-control"
                    placeholder="Recherche..." wire:model="search" required>
        </div>
    </div>

    <div class="table-responsive bg-white p-2">
        <table class="mb-0 table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>PAU</th>
                    <th>PVU</th>
                    <th>Qté en Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>
                        <input type="checkbox" wire:model="ids" value="{{ $product->id }}">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <a class="btn btn-success btn-xs" href="{{ route('cart.add', ['product' => $product->id, 'instance' => $instance]) }}" title="Ajouter au panier" wire:click.prevent="addProduct({{ $product->id }})"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Pas d'enregistrements</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="my-2">
        <a href="" wire:click.prevent="addProducts()" class="btn btn-info"><i class="fa fa-plus mr-2"></i> Ajouter les sélections</a>
        <a href="" wire:click.prevent="truncateProducts()" class="btn btn-warning"><i class="fa fa-times mr-2"></i> Vider les sélections</a>
    </p>

    <p>Page : {{ $products->currentPage() }} | Nombre : {{ $products->count() }} | Total : {{ $products->total() }} | Par page : {{ $products->perPage() }}</p>

    {{ $products->onEachSide(5)->links('vendor/pagination/bootstrap-4') }}
</section>

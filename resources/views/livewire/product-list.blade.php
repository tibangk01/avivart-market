<section>
    <div class="row">
        <div class="col-md-8">
            <h6 class="pt-2">
                <span class="btn btn-default"><i class="fa fa-list mr-2"></i> Sélection <b>({{ count($ids) }})</b></span>
                @if(count($ids) > 0)
                <a href="" wire:click.prevent="addProducts()" class="btn btn-info"><i class="fa fa-plus mr-2"></i> Ajouter les sélections</a>
                <a href="" wire:click.prevent="truncateProducts()" class="btn btn-warning"><i class="fa fa-times mr-2"></i> Vider les sélections</a>
                @endif
            </h6>
        </div>
        <div class="col-md-4 py-2">
            <input type="search" name="search" id="search" class="form-control" placeholder="Rechercher..." wire:model="search" required>
        </div>
    </div>

    <div wire:loading>
        Veuillez patienter...
    </div>

    <div class="table-responsive">
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

    <p>Page : {{ $products->currentPage() }} | Nombre : {{ $products->count() }} | Total : {{ $products->total() }} | Par page : {{ $products->perPage() }}</p>

    {{ $products->onEachSide(5)->links('vendor/pagination/bootstrap-4') }}
</section>

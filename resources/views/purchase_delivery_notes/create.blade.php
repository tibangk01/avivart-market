 @extends('layouts.dashboard', ['title' => "Réception fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if($purchases->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Unité</th>
                                <th>Qté en Stock</th>
                                <th>Qté Vendue</th>
                                <th>PAG</th>
                                <th>PAU</th>
                                <th>Qté Cmdée</th>
                                <th>Qté Livrée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                            <tr class="table-primary text-center">
                                <th colspan="8">Commande fournisseur N° {{ $purchase->getNumber() }} addressé au Fournisseur {{ $purchase->provider->getName() }}</th>
                                <td>Nombre de Produits ({{ $purchase->products->count() }})</td>
                                <td>
                                    @if($purchase->has_delivery_note)
                                    <strong class="badge badge-info">Fichier attaché</strong>
                                    @else
                                    <a href="{{ route('library.create', array('purchase' => $purchase->id)) }}">Attacher un fichier</a>
                                    @endif
                                </td>
                            </tr>

                            @forelse($purchase->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->product_type->name }}</td>
                                <td>{{ $product->conversion->name }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->sold_quantity }}</td>
                                <td>{{ $product->pivot->global_purchase_price }}</td>
                                <td>{{ $product->pivot->purchase_price }}</td>
                                <td>{{ $product->pivot->ordered_quantity }}</td>
                                <td>{{ $product->pivot->delivered_quantity }}</td>
                                <td>
                                    @if(!is_null($product->pivot->comment))
                                    <strong class="badge badge-success">{{ $product->pivot->comment }}</strong>
                                    @else
                                    {!! Form::open(['route' => 'purchase_delivery_note.store']) !!}
                                    <input type="hidden" name="product_purchase_id" value="{{ $product->pivot->id }}">
                                    <div class="input-group">
                                        <input type="text" name="comment" id="comment" class="form-control"
                                            placeholder="Commentaire" value="{{ $product->pivot->comment }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-dark">Valider</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">Pas de produit</td>
                            </tr>
                            @endforelse

                            @empty
                            <tr>
                                <td colspan="10">Pas d'enregistrements</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @else

                <p>Vide</p>

                @endif
            </div>
        </div>
    </div>  
</section>
@endsection
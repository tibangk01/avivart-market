 @extends('layouts.dashboard', ['title' => "Livraison client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if($orders->count())

                {!! Form::open(['method' => 'GET', 'route' => 'order_delivery_note.create']) !!}
                <fieldset>
                    <legend class="text-sm text-danger font-weight-bold">Recherche Avancée</legend>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                {!! Form::select('order_id', $orders, request()->query('order_id'), ['class' => 'form-control', 'placeholder' => "Toutes"]) !!}
                                {!! Form::label('purchase_id', "Commande client") !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {!! Form::submit('Filtrer', ['class' => 'btn btn-info btn-block']) !!}
                            </div>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Unité</th>
                                <th>Qté en Stock</th>
                                <th>Qté Vendue</th>
                                <th>PVG</th>
                                <th>PVU</th>
                                <th>PLG</th>
                                <th>PLU</th>
                                <th>Qté Cmdée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr class="table-primary text-center">
                                <th colspan="9">Commande client N° {{ $order->getNumber() }} addressée au client {{ $order->customer->getName() }}</th>
                                <td>Nombre de Produits ({{ $order->products->count() }})</td>
                                <td>
                                    @if($order->has_delivery_note)
                                    <strong class="badge badge-info">Fichier attaché</strong>
                                    @else
                                    <a href="{{ route('library.create', array('order' => $order->id)) }}">Attacher un fichier</a>
                                    @endif
                                </td>
                            </tr>

                            @forelse($order->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->product_type->name }}</td>
                                <td>{{ $product->conversion->name }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->sold_quantity }}</td>
                                <td>{{ $product->pivot->global_selling_price }}</td>
                                <td>{{ $product->pivot->selling_price }}</td>
                                <td>{{ $product->pivot->global_rental_price }}</td>
                                <td>{{ $product->pivot->rental_price }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>
                                    @if(!is_null($product->pivot->comment))
                                    <strong class="badge badge-success">{{ $product->pivot->comment }}</strong>
                                    @else
                                    {!! Form::open(['route' => 'order_delivery_note.store']) !!}
                                    <input type="hidden" name="product_order_id" value="{{ $product->pivot->id }}">
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
                                <td colspan="11">Pas de produit</td>
                            </tr>
                            @endforelse

                            @empty
                            <tr>
                                <td colspan="11">Pas d'enregistrements</td>
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
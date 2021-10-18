 @extends('layouts.dashboard', ['title' => "Ajout d'un bon de réception fournisseur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if($purchases->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap datatable text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Unité</th>
                                <th>Prix d'Achat</th>
                                <th>Prix de Vente</th>
                                <th>Prix de Location</th>
                                <th>Quantité en stock</th>
                                <th>Quantité vendue</th>
                                <th>Date de Création</th>
                                <th>Date de modification</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                            <tr class="table-primary">
                                <th colspan="10">Bon de commande N° {{ $purchase->getNumber() }}</th>
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
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->rental_price }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->sold_quantity }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
                                    @if(!is_null($product->pivot->comment))
                                    <strong class="badge badge-success">Commentaire appliqué</strong>
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
                                <td colspan="11">
                                    Pas de produit.
                                </td>
                            </tr>
                            @endforelse

                            @empty
                            <tr>
                                <td colspan="11">
                                    Pas d'enregistrements.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @else
                @endif
            </div>
        </div>
    </div>  
</section>
@endsection
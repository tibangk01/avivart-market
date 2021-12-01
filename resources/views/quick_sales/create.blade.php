@extends('layouts.dashboard', ['title' => 'Vente rapide'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Formulaire d'enregistrement</h4>

                    {!! Form::open(['method' => 'POST', 'route' => 'quick_sale.store']) !!}

                    <div class="form-group">
                        {!! Form::label('product_id', 'Produit') !!}
                        {!! Form::select('product_id', $products, request('product_id'), ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('quantity', 'Quantité') !!}
                        {!! Form::number('quantity', 1, ['class' => 'form-control', 'required' => true, 'min' => 1, 'step' => 1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('vat_id', 'TVA') !!}
                        {!! Form::select('vat_id', $vats, null, ['class' => 'form-control', 'placeholder' => 'Choisissez']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('discount_id', 'Remise') !!}
                        {!! Form::select('discount_id', $discounts, null, ['class' => 'form-control', 'placeholder' => 'Choisissez']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('order_state_id', 'Etat') !!}
                        {!! Form::select('order_state_id', $orderStates, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Choisissez']) !!}
                    </div>

                    <div class="form-group">
                        <span class="mr-3">Statut :</span>

                        <label for="valueOne" class="form-label mr-3">
                            {!! Form::radio('paid', 0, null, ['id' => 'valueOne']) !!} Non payer
                        </label>

                        <label for="valueTwo" class="form-label">
                            {!! Form::radio('paid', 1, true, ['id' => 'valueTwo']) !!} Payer
                        </label>
                    </div>

                    <div class="form-group text-right">
                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-6">
                    <h4>Liste de produits</h4>

                    <div class="table-responsive">
                        <table class="mb-0 table table-bordered table-hover table-striped datatable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Action</th>
                                    <th>Nom</th>
                                    <th>PAU</th>
                                    <th>PVU</th>
                                    <th>Qté en Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td>
                                        <a class="btn btn-info btn-xs" title="Prendre" href="{{ route('quick_sale.create', ['product_id' => $product->id]) }}"><i class="fa fa-arrow-circle-left"></i></a>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->stock_quantity }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Pas d'enregistrements</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
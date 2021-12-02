 @extends('layouts.dashboard', ['title' => "Inventaires"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <x-create-record routeName="exercise_product.create" />
                                    </div>
                                </div>

                                {!! Form::open(['method' => 'GET', 'route' => 'exercise_product.index']) !!}
                                <fieldset>
                                    <legend class="text-sm text-danger font-weight-bold">Recherche Avancée</legend>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <select class="form-control" id="exercise_id" name="exercise_id">
                                                    <option value="">Toutes</option>
                                                    @foreach($exercises as $exercise)
                                                    <option value="{{ $exercise->id }}" {{ request()->query('exercise_id') == $exercise->id ? 'selected' : null }}>{{ $exercise->getPeriod() }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="order_id">Période d'inventaire</label>
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
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Produit</th>
                                                <th>Stock Initial</th>
                                                <th>Stock Final</th>
                                                <th>Perte</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($exercises as $exercise)
                                                <tr class="table-warning text-center">
                                                    <th colspan="5">Periode : {{ $exercise->getPeriod() }}</th>
                                                    <td>Nombre de Produits ({{ $exercise->products->count() }})</td>
                                                    <td>
                                                        <x-print-one-record routeName="exercise.printing.inventory" :routeParam="$exercise->id" />
                                                    </td>
                                                </tr>
                                                @forelse($exercise->products as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->pivot->initial_stock }}</td>
                                                        <td>{{ $product->pivot->final_stock }}</td>
                                                        <td>{{ $product->pivot->loss }}</td>
                                                        <td>{{ $product->pivot->created_at }}</td>
                                                        <td>{{ $product->pivot->updated_at }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="exercise_product.show" :routeParam="$product->pivot->id" />
                                                            
                                                            <x-edit-record routeName="exercise_product.edit" :routeParam="$product->pivot->id" />

                                                            <x-destroy-record routeName="exercise_product.destroy" :routeParam="$product->pivot->id" />
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7">Pas d'enregistrements</td>
                                                    </tr>
                                                @endforelse
                                            @empty
                                                <tr>
                                                    <td colspan="7">Pas d'enregistrements</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection
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
                                    <div class="ml-auto">

                                        <a class="btn btn-flat btn-primary mb-1" href="{{ route('exercise_product.create') }}"><i
                                                class="fa fa-plus"></i>
                                            Ajouter</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Période d'inventaire</th>
                                                <th>Produit</th>
                                                <th>Vente Réelle</th>
                                                <th>Stock Initial</th>
                                                <th>Stock Final</th>
                                                <th>Perte</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($exerciseProducts as $exerciseProduct)
                                                <tr>
                                                    <td>{{ $exerciseProduct->exercise->getPeriod() }}</td>
                                                    <td>{{ $exerciseProduct->product->name }}</td>
                                                    <td>{{ $exerciseProduct->exercise->real_sale }}</td>
                                                    <td>{{ $exerciseProduct->initial_stock }}</td>
                                                    <td>{{ $exerciseProduct->final_stock }}</td>
                                                    <td>{{ $exerciseProduct->loss }}</td>
                                                    <td>{{ $exerciseProduct->created_at }}</td>
                                                    <td>{{ $exerciseProduct->updated_at }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                            href="{{ route('exercise_product.show', $exerciseProduct) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('exercise_product.edit', $exerciseProduct) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('exercise_product.destroy', $exerciseProduct) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9">Pas d'enregistrements</td>
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
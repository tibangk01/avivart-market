 @extends('layouts.dashboard', ['title' => "Commandes client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                        <a class="btn btn-flat btn-dark" target="_blank" 
                                                            href="{{ route('order.printing.all') }}"
                                                            title="Imprimer"><i class="fa fa-print"></i> Imprimer</a>

                                        <a class="btn btn-flat btn-primary"
                                            href="{{ route('order.create') }}"><i class="fa fa-plus"></i>
                                            Ajouter</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped text-nowrap datatable text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Client</th>
                                                <th>Etat</th>
                                                <th>TVA</th>
                                                <th>Remise</th>
                                                <th>Total TTC</th>
                                                <th>Payement</th>
                                                <th>Date de Création</th>
                                                <th>Date de modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr class="{{ $order->getOrderStateStyle() }}">
                                                    <td>{{ $order->getNumber() }}</td>
                                                    <td>{{ $order->customer->getName() }}</td>
                                                    <td>{{ $order->order_state->name }}</td>
                                                    <td>{{ $order->getVat() }}</td>
                                                    <td>{{ $order->getDiscount() }}</td>
                                                    <td>{{ $order->totalTTC() }}</td>
                                                    <td>{{ $order->getPaid() }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->updated_at }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                            href="{{ route('order.show', $order) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('order.edit', $order) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('order.destroy', $order) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-dark btn-xs" target="_blank" 
                                                            href="{{ route('order.printing.one', $order) }}"
                                                            title="Imprimer"><i class="fa fa-print"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="10">Pas d'enregistrements</td>
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
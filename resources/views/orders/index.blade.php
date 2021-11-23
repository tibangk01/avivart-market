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
                                        <x-print-all-record routeName="order.printing.all" />
                                            
                                        <x-create-record routeName="order.create" />
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Client</th>
                                                <th>Etat</th>
                                                <th>Statut</th>
                                                <th>Fichier</th>
                                                <th>TVA</th>
                                                <th>Remise</th>
                                                <th>Total TTC</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr class="{{ $order->getOrderStateStyle() }}">
                                                    <td>{{ $order->getNumber() }}</td>
                                                    <td>{{ $order->customer->getName() }}</td>
                                                    <td>{{ $order->order_state->name }}</td>
                                                    <td><span class="{{ $order->paid ? 'badge badge-success' : 'badge badge-danger' }}">{{ $order->getPaid() }}</span></td>
                                                    <td><span class="{{ $order->has_delivery_note ? 'badge badge-primary' : 'badge badge-warning' }}">{{ $order->hasDeliveryNote() }}</span></td>
                                                    <td>{{ $order->getVat() }}</td>
                                                    <td>{{ $order->getDiscount() }}</td>
                                                    <td>{{ $order->totalTTC() }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->updated_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="order.show" :routeParam="$order->id" />
                                                        
                                                        @can('cudProductOrder', $order)
                                                        <x-edit-record routeName="order.edit" :routeParam="$order->id" />

                                                        <x-destroy-record routeName="order.destroy" :routeParam="$order->id" />
                                                        @endcan

                                                        <x-print-one-record routeName="order.printing.one" :routeParam="$order->id" />
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="11">Pas d'enregistrements</td>
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
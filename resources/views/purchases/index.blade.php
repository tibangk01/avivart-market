 @extends('layouts.dashboard', ['title' => "Commandes fournisseur"])

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
                                        <x-print-all-record routeName="purchase.printing.all" />
                                            
                                        <x-create-record routeName="purchase.create" />
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Fournisseur</th>
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
                                            @forelse ($purchases as $purchase)
                                                <tr>
                                                    <td>{{ $purchase->getNumber() }}</td>
                                                    <td>{{ $purchase->provider->getName() }}</td>
                                                    <td><span class="{{ $purchase->paid ? 'badge badge-success' : 'badge badge-danger' }}">{{ $purchase->getPaid() }}</span></td>
                                                    <td><span class="{{ $purchase->has_delivery_note ? 'badge badge-primary' : 'badge badge-warning' }}">{{ $purchase->hasDeliveryNote() }}</span></td>
                                                    <td>{{ $purchase->getVat() }}</td>
                                                    <td>{{ $purchase->getDiscount() }}</td>
                                                    <td>{{ $purchase->totalTTC() }}</td>
                                                    <td>{{ $purchase->created_at }}</td>
                                                    <td>{{ $purchase->updated_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="purchase.show" :routeParam="$purchase->id" />
                                                        
                                                        <x-edit-record routeName="purchase.edit" :routeParam="$purchase->id" />

                                                        <x-destroy-record routeName="purchase.destroy" :routeParam="$purchase->id" />

                                                        <x-print-one-record routeName="purchase.printing.one" :routeParam="$purchase->id" />
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
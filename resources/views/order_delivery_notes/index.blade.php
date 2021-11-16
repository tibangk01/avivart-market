 @extends('layouts.dashboard', ['title' => "Livraisons client"])

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
                                        <x-create-record routeName="order_delivery_note.create" />
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th></th>
                                                <th>Numéro</th>
                                                <th>Commande client</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orderDeliveryNotes as $orderDeliveryNote)
                                                <tr>
                                                    <td><x-library :library='$orderDeliveryNote->library' class="img25_25" /></td>
                                                    <td>{{ $orderDeliveryNote->getNumber() }}</td>
                                                    <td>{{ $orderDeliveryNote->order->getNumber() }}</td>
                                                    <td>{{ $orderDeliveryNote->created_at }}</td>
                                                    <td>{{ $orderDeliveryNote->updated_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="order_delivery_note.show" :routeParam="$orderDeliveryNote->id" />

                                                        <x-destroy-record routeName="order_delivery_note.destroy" :routeParam="$orderDeliveryNote->id" />
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">Pas d'enregistrements</td>
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
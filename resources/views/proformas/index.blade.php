 @extends('layouts.dashboard', ['title' => "Proformas"])

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
                                        <x-print-all-record routeName="proforma.printing.all" />
                                            
                                        <x-create-record routeName="proforma.create" />
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Client</th>
                                                <th>TVA</th>
                                                <th>Remise</th>
                                                <th>Total TTC</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($proformas as $proforma)
                                            <tr>
                                                <td>{{ $proforma->getNumber() }}</td>
                                                <td>{{ $proforma->customer->getName() }}</td>
                                                <td>{{ $proforma->getVat() }}</td>
                                                <td>{{ $proforma->getDiscount() }}</td>
                                                <td>{{ $proforma->totalTTC() }}</td>
                                                <td>{{ $proforma->created_at }}</td>
                                                <td>{{ $proforma->updated_at }}</td>
                                                <td class="d-flex flex-row justify-content-around align-items-center">
                                                    <x-show-record routeName="proforma.show" :routeParam="$proforma->id" />
                                                    
                                                    <x-edit-record routeName="proforma.edit" :routeParam="$proforma->id" />

                                                    <x-destroy-record routeName="proforma.destroy" :routeParam="$proforma->id" />

                                                    <x-print-one-record routeName="proforma.printing.one" :routeParam="$proforma->id" />
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8">Pas d'enregistrements</td>
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
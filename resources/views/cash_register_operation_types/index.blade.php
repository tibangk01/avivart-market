@extends('layouts.dashboard', ['title' => "Types d'opération de caisse"])

@section('body')
    <div class="content">
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
                                            <x-create-record routeName="cash_register_operation_type.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cashRegisterOperationTypes as $cashRegisterOperationType)
                                                <tr class="{{ $cashRegisterOperationType->getBgColor() }}">
                                                    <td>{{ $cashRegisterOperationType->name }}</td>
                                                    <td>{{ $cashRegisterOperationType->created_at }}</td>
                                                    <td>{{ $cashRegisterOperationType->updated_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="cash_register_operation_type.show" :routeParam="$cashRegisterOperationType->id" />
                                                            
                                                            <x-edit-record routeName="cash_register_operation_type.edit" :routeParam="$cashRegisterOperationType->id" />

                                                            <x-destroy-record routeName="cash_register_operation_type.destroy" :routeParam="$cashRegisterOperationType->id" />
                                                        </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">Pas d'enregistrements</td>
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
    </div>
@endsection

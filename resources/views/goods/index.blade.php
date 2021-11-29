@extends('layouts.dashboard', ['title' => "Amortissement des biens"])

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
                                            <x-create-record routeName="good.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Désignation du bien</th>
                                                    <th>Référence</th>
                                                    <th>Date de mise en service</th>
                                                    <th>Valeur d'origine</th>
                                                    <th>Taux pratiqué</th>
                                                    <th>Amortissement</th>
                                                    <th>Date fin amortissement</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($goods as $good)
                                                    <tr>
                                                        <td>{{ $good->name }}</td>
                                                        <td>{{ $good->ref }}</td>
                                                        <td>{{ $good->date_of_service->isoFormat('L') }}</td>
                                                        <td>{{ $good->original_value }}</td>
                                                        <td>{{ $good->rate_charged }}%</td>
                                                        <td>{{ $good->amortization }}</td>
                                                        <td>{{ $good->date_of_service->addYears($good->amortization)->isoFormat('L') }}</td>
                                                        <td>{{ $good->created_at }}</td>
                                                        <td>{{ $good->updated_at }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="good.show" :routeParam="$good->id" />
                                                            
                                                            <x-edit-record routeName="good.edit" :routeParam="$good->id" />

                                                            <x-destroy-record routeName="good.destroy" :routeParam="$good->id" />
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
    </div>
@endsection

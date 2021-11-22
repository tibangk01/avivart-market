@extends('layouts.dashboard', ['title' => "Périodes d'inventaire"])

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
                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Listes</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <x-create-record routeName="exercise.create" />
                                    </div>
                                </div>

                                <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Devise</th>
                                                    <th>Titre</th>
                                                    <th>Date de Début</th>
                                                    <th>Date de Fin</th>
                                                    <th>Vente Réelle</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($exercises as $exercise)
                                                <tr>
                                                    <td>{{ $exercise->currency->name }}</td>
                                                    <td>{{ $exercise->title }}</td>
                                                    <td>{{ $exercise->start_date->isoFormat('LL') }}</td>
                                                    <td>{{ $exercise->end_date->isoFormat('LL') }}</td>
                                                    <td>{{ $exercise->real_sale }}</td>
                                                    <td>{{ $exercise->created_at }}</td>
                                                    <td>{{ $exercise->created_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="exercise.show" :routeParam="$exercise->id" />
                                                        
                                                        <x-edit-record routeName="exercise.edit" :routeParam="$exercise->id" />

                                                        <x-destroy-record routeName="exercise.destroy" :routeParam="$exercise->id" />

                                                        <x-print-one-record routeName="exercise.printing.inventory" :routeParam="$exercise->id" />
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
</div>
@endsection

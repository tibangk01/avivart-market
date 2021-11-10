@extends('layouts.dashboard', ['title' => "Périodes d'inventaitre"])

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
                                    <div class="ml-auto">
                                        <a class="btn btn-flat btn-primary mb-1"
                                            href="{{ route('exercise.create') }}"><i class="fa fa-plus"></i>
                                            Ajouter</a>
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
                                                    <td>{{ $exercise->start_date }}</td>
                                                    <td>{{ $exercise->end_date }}</td>
                                                    <td>{{ $exercise->real_sale }}</td>
                                                    <td>{{ $exercise->created_at }}</td>
                                                    <td>{{ $exercise->created_at }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('exercise.show', $exercise) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs" href="{{ route('exercise.edit', $exercise) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs" href="{{ route('exercise.destroy',$exercise) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>

                                                        <a class="btn btn-dark btn-xs" target="_blank" 
                                                    href="{{ route('exercise.printing.inventory', $exercise) }}"
                                                    title="Inventaire"><i class="fa fa-print"
                                                        aria-hidden="true"></i></a>
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

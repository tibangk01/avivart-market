@extends('layouts.dashboard', ['title' => "Liste des exercices"])

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
                                            class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Devise</th>
                                                    <th>Titre</th>
                                                    <th>Date de Début</th>
                                                    <th>Date de Fin</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($exercises->count() > 0)
                                                    @foreach ($exercises as $exercise)
                                                        <tr>
                                                            <td>{{ $exercise->currency->name }}</td>
                                                            <td>{{ $exercise->title }}</td>
                                                            <td>{{ $exercise->start_date }}</td>
                                                            <td>{{ $exercise->end_date }}</td>
                                                            <td>{{ $exercise->created_at }}</td>
                                                            <td>{{ $exercise->created_at }}</td>
                                                            <td>
                                                                <a class="btn btn-info btn-xs" href="{{ route('exercise.show', $exercise) }}"
                                                                    title="Afficher"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a>
                                                                <a class="btn btn-warning btn-xs" href="{{ route('exercise.edit', $exercise) }}"
                                                                    title="Afficher"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                                <a class="btn btn-danger btn-xs" href="{{ route('exercise.destroy',$exercise) }}"
                                                                    title="Afficher"><i class="fa fa-trash"
                                                                        aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7">
                                                            Pas d'enregistrements.
                                                        </td>
                                                    </tr>
                                                @endif
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

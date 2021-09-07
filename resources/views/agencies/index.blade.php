@extends('layouts.dashboard', ['title' => 'Liste des agences'])

@section('body')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Listes</a>
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
                                                href="{{ route('agency.create') }}"><i class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Nom</th>
                                                    <th>Téléphone</th>
                                                    <th>Adresse</th>
                                                    <th>Email</th>
                                                    <th>Site web</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($agencies->count())
                                                    @foreach ($agencies as $agency)
                                                        <tr>
                                                            <td>{{ $agency->enterprise->code }}</td>
                                                            <td>{{ $agency->enterprise->name }}</td>
                                                            <td>{{ $agency->enterprise->phone_number }}</td>
                                                            <td>{{ $agency->enterprise->email }}</td>
                                                            <td>{{ $agency->enterprise->website }}</td>
                                                            <td>{{ $agency->enterprise->address }}</td>
                                                            <td>
                                                                {!! link_to_route('agency.show', 'Afficher', ['agency' => $agency], ['class' => 'btn ']) !!}
                                                                {!! link_to_route('agency.edit', 'Editer', ['agency' => $agency], ['class' => 'btn']) !!}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6">Pas d'enregistrment</td>
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
    </div>
@endsection

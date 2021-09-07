@extends('layouts.dashboard', ['title' => 'Liste des points de ventes'])

@section('body')
    <!-- Main content -->
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
                                                href="{{ route('sale_place.create') }}"><i class="fa fa-plus"></i>
                                                Ajouter</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Point de vente</th>
                                                    <th>Agence</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($sale_places->count())
                                                    @foreach ($sale_places as $sale_place)
                                                        <tr>
                                                            {{-- <td>{{ $sale_place->id }}</td> --}}
                                                            <td>{{ $sale_place->name }}</td>
                                                            <td>{{ $sale_place->agency->enterprise->name }}</td>
                                                            <td>
                                                                {!! link_to_route('sale_place.show', 'Afficher', ['sale_place' => $sale_place], ['class' => 'btn ']) !!}
                                                                {!! link_to_route('sale_place.edit', 'Editer', ['sale_place' => $sale_place], ['class' => 'btn']) !!}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3">Pas d'enregistrment</td>
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

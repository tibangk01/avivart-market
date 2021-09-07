@extends('layouts.dashboard', ['title' => "Liste des remises"])

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
                                                    href="{{ route('discount.create') }}"><i class="fa fa-plus"></i>
                                                    Ajouter</a>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                                <table
                                                    class="table table-bordered table-hover datatable text-nowrap text-center">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Montant</th>
                                                            <th>Date de Création</th>
                                                            <th>Date de modification</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($discounts->count() > 0)
                                                            @foreach ($discounts as $discount)
                                                                <tr>
                                                                    <td>{{ $discount->amount }}</td>
                                                                    <td>{{ $discount->created_at }}</td>
                                                                    <td>{{ $discount->created_at }}</td>
                                                                    <td>
                                                                        <a class="btn btn-info btn-xs" href="{{ route('discount.show', $discount) }}"
                                                                            title="Afficher"><i class="fa fa-eye"
                                                                                aria-hidden="true"></i></a>
                                                                        <a class="btn btn-warning btn-xs" href="{{ route('discount.edit', $discount) }}"
                                                                            title="Afficher"><i class="fa fa-edit"
                                                                                aria-hidden="true"></i></a>
                                                                        <a class="btn btn-danger btn-xs" href="{{ route('discount.destroy',$discount) }}"
                                                                            title="Afficher"><i class="fa fa-trash"
                                                                                aria-hidden="true"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="4">
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
    </div>
@endsection
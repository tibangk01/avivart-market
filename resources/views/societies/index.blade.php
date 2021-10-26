 @extends('layouts.dashboard', ['title' => "Liste des sociétés"])

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

                                <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Nom</th>
                                                    <th>Téléphone</th>
                                                    <th>Email</th>
                                                    <th>Site web</th>
                                                    <th>Code Fiscal</th>
                                                    <th>RCCM</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($societies as $society)
                                                <tr>
                                                    <td>{{ $society->enterprise->code }}</td>
                                                    <td>{{ $society->enterprise->name }}</td>
                                                    <td>{{ $society->enterprise->getFullPhoneNumber() }}</td>
                                                    <td>{{ $society->enterprise->email }}</td>
                                                    <td>{{ $society->enterprise->website }}</td>
                                                    <td>{{ $society->fiscal_code }}</td>
                                                    <td>{{ $society->tppcr }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('society.show', $society) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs" href="{{ route('society.edit', $society) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-dark btn-xs" target="_blank" 
                                                            href="{{ route('society.printing.one', $society) }}"
                                                            title="Imprimer"><i class="fa fa-print"
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
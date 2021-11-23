 @extends('layouts.dashboard', ['title' => "Sociétés"])

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
                                            class="table table-bordered table-hover table-striped datatable">
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
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="society.show" :routeParam="$society->id" />
                                                        
                                                        <x-edit-record routeName="society.edit" :routeParam="$society->id" />

                                                        <x-print-one-record routeName="society.printing.one" :routeParam="$society->id" />
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
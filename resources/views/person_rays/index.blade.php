@extends('layouts.dashboard', ['title' => "Types de fournisseur/client"])

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
                                    aria-selected="true">Liste</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <x-create-record routeName="person_ray.create" />
                                    </div>
                                </div>

                                <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($personRays as $personRay)
                                                <tr>
                                                    <td>{{ $personRay->name }}</td>
                                                    <td>{{ $personRay->created_at }}</td>
                                                    <td>{{ $personRay->created_at }}</td>
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="person_ray.show" :routeParam="$personRay->id" />
                                                        
                                                        <x-edit-record routeName="person_ray.edit" :routeParam="$personRay->id" />

                                                        <x-destroy-record routeName="person_ray.destroy" :routeParam="$personRay->id" />
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
        {{-- /.row --}}

    </div><!-- /.container-fluid -->
</div>
@endsection

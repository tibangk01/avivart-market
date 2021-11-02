 @extends('layouts.dashboard', ['title' => "Rôles & Utilisateurs"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
                                    <div class="ml-auto">

                                        <a class="btn btn-flat btn-primary mb-1" href="{{ route('role_user.create') }}"><i
                                                class="fa fa-plus"></i>
                                            Ajouter</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable text-nowrap text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Rôle</th>
                                                <th>Utilisateur</th>
                                                <th>Date de création</th>
                                                <th>Date de mise à jour</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($roleUsers as $roleUser)
                                                <tr>
                                                    <td>{{ $roleUser->role->name }}</td>
                                                    <td>{{ $roleUser->user->full_name }}</td>
                                                    <td>{{ $roleUser->created_at }}</td>
                                                    <td>{{ $roleUser->updated_at }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs"
                                                            href="{{ route('role_user.show', $roleUser) }}"
                                                            title="Afficher"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('role_user.edit', $roleUser) }}"
                                                            title="Modifier"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('role_user.destroy', $roleUser) }}"
                                                            title="Supprimer"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">Pas d'enregistrements</td>
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
</section>
@endsection
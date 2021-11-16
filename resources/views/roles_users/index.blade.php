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
                                    <div class="ml-auto mb-1">
                                        <x-create-record routeName="role_user.create" />
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Rôle</th>
                                                <th>Utilisateur</th>
                                                <th>Date de Création</th>
                                                <th>Date de Modification</th>
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
                                                    <td class="d-flex flex-row justify-content-around align-items-center">
                                                        <x-show-record routeName="role_user.show" :routeParam="$roleUser->id" />
                                                        
                                                        <x-edit-record routeName="role_user.edit" :routeParam="$roleUser->id" />

                                                        <x-destroy-record routeName="role_user.destroy" :routeParam="$roleUser->id" />
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
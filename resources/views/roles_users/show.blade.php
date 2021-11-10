 @extends('layouts.dashboard', ['title' => "Rôle & Utilisateur"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clé</th>
                                <th>Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rôle</td>
                                <td>{{ $roleUser->role->name }}</td>
                            </tr>
                            <tr>
                                <td>Utilisateur</td>
                                <td>{{ $roleUser->user->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Date de Création</td>
                                <td>{{ $roleUser->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Date de Modification</td>
                                <td>{{ $roleUser->updated_at }}</td>
                            </tr>
                            <tr class="table-light">
                                <th>Action</th>
                                <td>
                                    {!! link_to_route('role_user.edit', 'Editer', ['role_user' => $roleUser], ['class' => 'text-warning']) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection
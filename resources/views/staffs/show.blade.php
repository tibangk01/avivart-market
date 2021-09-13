@extends('layouts.dashboard', ['title' => 'Afficher le staff'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-stripped table-hover mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Clé</th>
                                    <th>Valeur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pays</td>
                                    <td>{{ $staff->human->user->country->name }}</td>
                                </tr>
                                <tr>
                                    <td>Rôle</td>
                                    <td>{{ $staff->human->role->name }}</td>
                                </tr>
                                <tr>
                                    <td>Civilité</td>
                                    <td>{{ $staff->human->user->civility->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nom & prénom</td>
                                    <td>{{ $staff->human->user->full_name }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td>{{ $staff->human->user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>Signature numérique</td>
                                    <td>{{ $staff->human->signature }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $staff->human->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Fonction</td>
                                    <td>{{ $staff->human->work->name }}</td>
                                </tr>
                                <tr>
                                    <td>Type de staff</td>
                                    <td>{{ $staff->staff_type->name }}</td>
                                </tr>
                                @if (!$staff->human->password_changed)
                                    <tr>
                                        <td>Identifiant temporaire</td>
                                        <td>{{ $staff->human->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mot de passe temporaire</td>
                                        <td>{{ $staff->human->password }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Avatar</td>
                                    <td>
                                        <img src="{{ $staff->human->user->library->remote }}" width="50" height="50"
                                            alt="{{ $staff->human->user->library->description }}">
                                        <a href="{{ route('library.edit', ['library' => $staff->human->user->library]) }}"
                                            class="btn btn-sm btn-info" title="Editer"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $staff->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de modification</td>
                                    <td>{{ $staff->updated_at->diffForHumans() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('staff.edit', 'Editer', ['staff' => $staff], ['class' => 'text-warning']) !!}
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

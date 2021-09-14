@extends('layouts.dashboard', ['title' => $staff->human->user->full_name])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-library :library='$staff->human->user->library' class="img-100x100" />
                    <p>
                        <a href="{{ route('library.edit', ['library' => $staff->human->user->library]) }}" class="btn btn-sm btn-link" title="Editer"><i class="fas fa-edit"></i></a>
                    </p>
                </div>

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
                                    <th>Pays</th>
                                    <td>{{ $staff->human->user->country->name }}</td>
                                </tr>
                                <tr>
                                    <th>Rôle</th>
                                    <td>{{ $staff->human->role->name }}</td>
                                </tr>
                                <tr>
                                    <th>Civilité</th>
                                    <td>{{ $staff->human->user->civility->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nom & prénom</th>
                                    <td>{{ $staff->human->user->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone</th>
                                    <td>{{ $staff->human->user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Signature numérique</th>
                                    <td>{{ $staff->human->signature }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $staff->human->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Fonction</th>
                                    <td>{{ $staff->human->work->name }}</td>
                                </tr>
                                <tr>
                                    <th>Type de staff</th>
                                    <td>{{ $staff->staff_type->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date de création</th>
                                    <td>{{ $staff->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <th>Date de modification</th>
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

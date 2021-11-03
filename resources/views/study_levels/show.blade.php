@extends('layouts.dashboard', ['title' => "Niveau d'étude"])

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
                                    <td>Nom</td>
                                    <td>{{ $studyLevel->name }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $studyLevel->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
                                    <td>{{ $studyLevel->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('study_level.edit','Editer', ['study_level' => $studyLevel], ['class' => 'text-warning'] ) !!}
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

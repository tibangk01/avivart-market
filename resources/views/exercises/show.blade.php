@extends('layouts.dashboard', ['title' => "Période d'inventaire"])

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
                                <th>Devise</th>
                                <td>{{ $exercise->currency->name }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $exercise->title }}</td>
                            </tr>
                            <tr>
                                <th>Date de Début</th>
                                <td>{{ $exercise->start_date->isoFormat('LL') }}</td>
                            </tr>
                            <tr>
                                <th>Date de Fin</th>
                                <td>{{ $exercise->end_date->isoFormat('LL') }}</td>
                            </tr>
                            <tr>
                                <th>Vente Réelle</th>
                                <td>{{ $exercise->real_sale }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $exercise->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $exercise->updated_at }}</td>
                            </tr>
                            <tr class="table-light">
                                <th>Action</th>
                                <td>
                                    {!! link_to_route('exercise.edit','Editer', ['exercise' => $exercise], ['class' => 'text-warning'] ) !!}
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
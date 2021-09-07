@extends('layouts.dashboard', ['title' => "Détails de la tva"])

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
                                    <th>Pourcentage</th>
                                    <td>{{ $vat->percentage }}</td>
                                </tr>
                                <tr>
                                    <th>Date de création</th>
                                    <td>{{ $vat->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <th>Date de mise à jour</th>
                                    <td>{{ $vat->updated_at->diffForHumans() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('vat.edit','Editer', ['vat' => $vat], ['class' => 'text-warning'] ) !!}
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
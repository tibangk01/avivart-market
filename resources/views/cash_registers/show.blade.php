@extends('layouts.dashboard', ['title' => 'Afficher la caisse'])

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
                                    <td>Nom</td>
                                    <td>{{ $cashRegister->name }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $cashRegister->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
                                    <td>{{ $cashRegister->updated_at->diffForHumans() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('cash_register.edit','Editer', ['cash_register' => $cashRegister], ['class' => 'text-warning'] ) !!}
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

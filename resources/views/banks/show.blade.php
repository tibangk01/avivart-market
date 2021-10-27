@extends('layouts.dashboard', ['title' => 'Afficher la banque'])

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
                                    <td>{{ $bank->name }}</td>
                                </tr>
                                <tr>
                                    <td>N° de compte</td>
                                    <td>{{ $bank->account }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $bank->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
                                    <td>{{ $bank->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('bank.edit', 'Editer', ['bank' => $bank], ['class' => 'text-warning']) !!}
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

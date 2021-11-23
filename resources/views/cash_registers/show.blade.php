@extends('layouts.dashboard', ['title' => 'Caisse'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
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
                                    <td>Date de Création</td>
                                    <td>{{ $cashRegister->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Modification</td>
                                    <td>{{ $cashRegister->updated_at }}</td>
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

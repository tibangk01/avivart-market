@extends('layouts.dashboard', ['title' => "Afficher un type d'opération de caisse"])

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
                                <tr class="{{ $cashRegisterOperationType->getBgColor() }}">
                                    <td>Dénomination</td>
                                    <td>{{ $cashRegisterOperationType->name }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $cashRegisterOperationType->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
                                    <td>{{ $cashRegisterOperationType->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>

                                        {!! link_to_route('cash_register_operation_type.edit', 'Editer', ['cash_register_operation_type' => $cashRegisterOperationType], ['class' => 'text-warning']) !!}
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

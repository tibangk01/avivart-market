@extends('layouts.dashboard', ['title' => "Afficher une opération de caisse"])

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
                                    <td>Type</td>
                                    <td class="{{ $cashRegisterOperation->cash_register_operation_type->getForeColor() }}">
                                        {{ $cashRegisterOperation->cash_register_operation_type->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Montant</td>
                                    <td>{{ $cashRegisterOperation->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $cashRegisterOperation->created_at->diffForhumans() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
                                    <td>{{ $cashRegisterOperation->updated_at->diffForhumans() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('cash_register_operation.edit', 'Editer', ['cash_register_operation' => $cashRegisterOperation], ['class' => 'text-warning']) !!}
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

@extends('layouts.dashboard', ['title' => "Opération de caisse"])

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
                                    <td>Numéro</td>
                                    <td>{{ $cashRegisterOperation->getNumber() }}</td>
                                </tr>
                                <tr class="{{ $cashRegisterOperation->cash_register_operation_type->getBgColor() }}">
                                    <td>Type</td>
                                    <td>
                                        {{ $cashRegisterOperation->cash_register_operation_type->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Montant</td>
                                    <td>{{ $cashRegisterOperation->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire</td>
                                    <td>{{ $cashRegisterOperation->comment }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Création</td>
                                    <td>{{ $cashRegisterOperation->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Modification</td>
                                    <td>{{ $cashRegisterOperation->updated_at }}</td>
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

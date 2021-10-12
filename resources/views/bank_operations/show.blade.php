@extends('layouts.dashboard', ['title' => "Afficher une opération de banque"])

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
                                    <td>Bnaque</td>
                                    <td>{{ $bankOperation->bank->name }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td class="{{ $bankOperation->bank_operation_type->getForeColor() }}">
                                        {{ $bankOperation->bank_operation_type->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Montant</td>
                                    <td>{{ $bankOperation->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire</td>
                                    <td>{{ $bankOperation->comment }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $bankOperation->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mis à jour</td>
                                    <td>{{ $bankOperation->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('bank_operation.edit', 'Editer', ['bank_operation' => $bankOperation], ['class' => 'text-warning']) !!}
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

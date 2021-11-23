@extends('layouts.dashboard', ['title' => "Type d'opération de caisse"])

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
                                <tr class="{{ $cashRegisterOperationType->getBgColor() }}">
                                    <td>Nom</td>
                                    <td>{{ $cashRegisterOperationType->name }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Création</td>
                                    <td>{{ $cashRegisterOperationType->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Modification</td>
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

@extends('layouts.dashboard', ['title' => "Type d'opération de banque"])

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
                                <tr class="{{ $bankOperationType->getBgColor() }}">
                                    <td>Nom</td>
                                    <td>{{ $bankOperationType->name }}</td>
                                </tr>
                                <tr>
                                    <td>Etat</td>
                                    <td>{{ $bankOperationType->getStateText() }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Création</td>
                                    <td>{{ $bankOperationType->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Modification</td>
                                    <td>{{ $bankOperationType->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>

                                        {!! link_to_route('bank_operation_type.edit', 'Editer', ['bank_operation_type' => $bankOperationType], ['class' => 'text-warning']) !!}
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

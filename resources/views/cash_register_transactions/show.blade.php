@extends('layouts.dashboard', ['title' => 'Afficher la transaction de caisse'])

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
                                    <td>Exercice</td>
                                    <td>{{ $cashRegisterTransaction->day_transaction->exercise->getPeriod() }}</td>
                                </tr>
                                <tr>
                                    <td>Journée</td>
                                    <td>{{ $cashRegisterTransaction->day_transaction->getDay() }}</td>
                                </tr>
                                <tr>
                                    <td>Staff</td>
                                    <td>{{ $cashRegisterTransaction->staff->human->user->full_name }}</td>
                                </tr>
                                <tr>
                                    <td>Caisse</td>
                                    <td>{{ $cashRegisterTransaction->cash_register->name }}</td>
                                </tr>
                                <tr>
                                    <td>Montant</td>
                                    <td>{{ $cashRegisterTransaction->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Etat</td>
                                    <td>{{ $cashRegisterTransaction->getState() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('cash_register_transaction.edit', 'Editer', ['cash_register_transaction' => $cashRegisterTransaction], ['class' => 'text-warning']) !!}
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

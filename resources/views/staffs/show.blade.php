@extends('layouts.dashboard', ['title' => $staff->human->user->full_name])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <x-library :library='$staff->human->user->library' class="img200_200" />
                    <a href="{{ route('library.edit', $staff->human->user->library) }}"><i class="fas fa-edit"></i> Editer</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h4>Mes informations</h4>

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
                                    <th>Numéro Matricule</th>
                                    <td>{{ $staff->human->serial_number }}</td>
                                </tr>
                                <tr>
                                    <th>Pays</th>
                                    <td>{{ $staff->human->user->country->name }}</td>
                                </tr>
                                <tr>
                                    <th>Civilité</th>
                                    <td>{{ $staff->human->user->civility->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nom & prénom</th>
                                    <td>{{ $staff->human->user->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone</th>
                                    <td>{{ $staff->human->user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Signature numérique</th>
                                    <td>{{ $staff->human->signature }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $staff->human->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Fonction</th>
                                    <td>{{ $staff->human->work->name }}</td>
                                </tr>
                                <tr>
                                    <th>Type de staff</th>
                                    <td>{{ $staff->staff_type->name }}</td>
                                </tr>
                                <tr>
                                    <th>Type de contrat</th>
                                    <td>{{ $staff->human->contract_type->name }}</td>
                                </tr>
                                <tr>
                                    <th>Niveau d'étude</th>
                                    <td>{{ $staff->human->study_level->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date de naissance</th>
                                    <td>{{ $staff->human->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <th>Lieu de naissance</th>
                                    <td>{{ $staff->human->place_of_birth }}</td>
                                </tr>
                                <tr>
                                    <th>Date d'embauche</th>
                                    <td>{{ $staff->human->hiring_date }}</td>
                                </tr>
                                <tr>
                                    <th>Date de fin de contrat</th>
                                    <td>{{ $staff->human->contract_end_date }}</td>
                                </tr>
                                <tr>
                                    <th>Date de création</th>
                                    <td>{{ $staff->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Date de modification</th>
                                    <td>{{ $staff->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('staff.edit', 'Editer', ['staff' => $staff], ['class' => 'text-warning']) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h4>Mes Transactions de Caisse Journalière (TCJ)</h4>

                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-stripped table-hover mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Journée</th>
                                    <th>Caisse</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($staff->cash_register_transactions as $cashRegisterTransaction)
                                <tr>
                                    <td>{{ $cashRegisterTransaction->day_transaction->getDay() }} ({{ $cashRegisterTransaction->day_transaction->getState() }})</td>
                                    <td>{{ $cashRegisterTransaction->cash_register->name }} ({{ $cashRegisterTransaction->getState() }})</td>
                                    <td>{{ $cashRegisterTransaction->amount }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Aucune</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

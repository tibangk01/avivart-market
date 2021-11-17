 @extends('layouts.dashboard', ['title' => auth()->user()->full_name])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active rounded-0" id="nav-first-tab" data-toggle="tab"
                                        href="#nav-first" role="tab" aria-controls="nav-first"
                                        aria-selected="true">A propos</a>

                                    <a class="nav-item nav-link rounded-0" id="nav-second-tab" data-toggle="tab"
                                        href="#nav-second" role="tab" aria-controls="nav-second"
                                        aria-selected="true">Pistes d'audit</a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body py-1">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-first" role="tabpanel"
                                aria-labelledby="nav-first-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <x-print-one-record routeName="staff.printing.one" :routeParam="$staff->id" />

                                        <x-edit-record routeName="user.edit" :routeParam="$staff->human->user->id" />
                                    </div>
                                </div>

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
                                                <th>Date de Création</th>
                                                <td>{{ $staff->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date de Modification</th>
                                                <td>{{ $staff->updated_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-second" role="tabpanel"
                                aria-labelledby="nav-second-tab">
                                    <div class="d-flex">
                                        <div class="ml-auto mb-1">
                                            <x-print-all-record routeName="transaction.printing.all" />
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th></th>
                                                    <th>Utilisateur</th>
                                                    <th>Type de transaction</th>
                                                    <th>Activité</th>
                                                    <th>Date de Création</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse (auth()->user()->transactions as $transaction)
                                            <tr>
                                                <td><x-library :library='$transaction->user->library' class="img25_25" /></td>
                                                <td>{{ $transaction->user->full_name }}</td>
                                                <td>{{ $transaction->transaction_type->name }}</td>
                                                <td>{{ $transaction->activity }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td class="d-flex flex-row justify-content-around align-items-center">
                                                    <x-show-record routeName="transaction.show" :routeParam="$transaction->id" />

                                                    <x-print-one-record routeName="transaction.printing.one" :routeParam="$transaction->id" />
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">Pas d'enregistrements.</td>
                                            </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>  
</section>
@endsection
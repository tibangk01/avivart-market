 @extends('layouts.dashboard', ['title' => "Pistes d'audit"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste</a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body py-1">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="d-flex">
                                        <div class="ml-auto mb-1">
                                            <x-print-all-record routeName="transaction.printing.all" />
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
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
                                            @forelse ($transactions as $transaction)
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
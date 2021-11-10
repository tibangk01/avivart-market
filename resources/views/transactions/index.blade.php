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
                                            <a class="btn btn-flat btn-dark" target="_blank" 
                                                            href="{{ route('transaction.printing.all') }}"
                                                            title="Imprimer"><i class="fa fa-print"></i> Imprimer</a>
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
                                                <td>
                                                    <a class="btn btn-info btn-xs"
                                                        href="{{ route('transaction.show', $transaction) }}"
                                                        title="Afficher"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a>

                                                    <a class="btn btn-dark btn-xs" target="_blank" 
                                                            href="{{ route('transaction.printing.one', $transaction) }}"
                                                            title="Imprimer"><i class="fa fa-print"
                                                                aria-hidden="true"></i></a>
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
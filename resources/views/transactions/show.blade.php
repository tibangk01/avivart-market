 @extends('layouts.dashboard', ['title' => "Piste d'audit"])

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
                                <th>Utilisateur</th>
                                <td>{{ $transaction->user->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Type de transaction</th>
                                <td>{{ $transaction->transaction_type->name }}</td>
                            </tr>
                            <tr>
                                <th>Activité</th>
                                <td>{{ $transaction->activity }}</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $transaction->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
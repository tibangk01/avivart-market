@extends('layouts.dashboard', ['title' => 'Transaction de journée'])

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
                                    <td>Période</td>
                                    <td>{{ $dayTransaction->exercise->getPeriod() }}</td>
                                </tr>
                                <tr>
                                    <td>Journée</td>
                                    <td>{{ $dayTransaction->getDay() }}</td>
                                </tr>
                                <tr>
                                    <td>Etat</td>
                                    <td>{{ $dayTransaction->getState() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('day_transaction.edit', 'Editer', ['day_transaction' => $dayTransaction], ['class' => 'text-warning']) !!}
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

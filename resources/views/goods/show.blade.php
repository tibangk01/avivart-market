@extends('layouts.dashboard', ['title' => 'Amortissement de bien'])

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
                                <tr>
                                    <td>Désignation du bien</td>
                                    <td>{{ $good->name }}</td>
                                </tr>
                                <tr>
                                    <td>Référence</td>
                                    <td>{{ $good->ref }}</td>
                                </tr>
                                <tr>
                                    <td>Date de mise en service</td>
                                    <td>{{ $good->date_of_service->isoFormat('L') }}</td>
                                </tr>
                                <tr>
                                    <td>Valeur d'origine</td>
                                    <td>{{ $good->original_value }}</td>
                                </tr>
                                <tr>
                                    <td>Taux pratiqué</td>
                                    <td>{{ $good->rate_charged }}%</td>
                                </tr>
                                <tr>
                                    <td>Amortissement</td>
                                    <td>{{ $good->amortization }}</td>
                                </tr>
                                <tr>
                                    <td>Date fin amortissement</td>
                                    <td>{{ $good->date_of_service->addYears($good->amortization)->isoFormat('L') }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Création</td>
                                    <td>{{ $good->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Date de Modification</td>
                                    <td>{{ $good->updated_at }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('good.edit', 'Editer', ['good' => $good], ['class' => 'text-warning']) !!}
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

@extends('layouts.dashboard', ['title' => $society->enterprise->name])

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
                                    <th>Code</th>
                                    <td>{{ $society->enterprise->code }}</td>
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td>{{ $society->enterprise->name }}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone</th>
                                    <td>{{ $society->enterprise->phone_number}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $society->enterprise->email }}</td>
                                </tr>
                                <tr>
                                    <th>Adresse</th>
                                    <td>{{ $society->enterprise->address}}</td>
                                </tr>
                                <tr>
                                    <th>Site web</th>
                                    <td><a target="_blank" href="{{ $society->enterprise->website}}">{{ $society->enterprise->website}}</a></td>
                                </tr>
                                <tr>
                                    <th>Code Fiscal</th>
                                    <td>{{ $society->fiscal_code }}</td>
                                </tr>
                                <tr>
                                    <th>RCCM</th>
                                    <td>{{ $society->tppcr }}</td>
                                </tr>
                                <tr>
                                    <th>Date de création</th>
                                    <td>{{ $society->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <th>Date de mise à jour</th>
                                    <td>{{ $society->updated_at->diffForHumans() }}</td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        {!! link_to_route('society.edit','Editer', ['society' => $society], ['class' => 'text-warning'] ) !!}
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

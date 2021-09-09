// custom here
@extends('layouts.dashboard', ['title' => 'Afficher une agence'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-stripped table-hover mb-0">
                            <thead class="thead-dark">
                                // custom here
                                <tr>
                                    <th>Clé</th>
                                    <th>Valeur</th>
                                </tr>
                            </thead>
                            <tbody>
                                // custom here
                                <tr>
                                    <td>Code</td>
                                    <td></td>
                                </tr>
                                <tr class="table-light">
                                    <th>Action</th>
                                    <td>
                                        //custom here
                                        {!! link_to_route('agency.edit','Editer', ['agency' => $agency], ['class' => 'text-warning'] ) !!}
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

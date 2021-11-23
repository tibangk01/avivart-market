@extends('layouts.dashboard', ['title' => "TVA"])

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
                                <th>Pourcentage</th>
                                <td>{{ $vat->percentage }}</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $vat->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de Modification</th>
                                <td>{{ $vat->updated_at }}</td>
                            </tr>
                            <tr class="table-light">
                                <th>Action</th>
                                <td>
                                    {!! link_to_route('vat.edit','Editer', ['vat' => $vat], ['class' => 'text-warning'] ) !!}
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
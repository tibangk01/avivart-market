@extends('layouts.dashboard', ['title' => $society->enterprise->name])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p>
                <a class="btn btn-flat btn-dark" target="_blank" 
                                                            href="{{ route('society.printing.one', $society) }}"
                                                            title="Imprimer"><i class="fa fa-print"
                                                                aria-hidden="true"></i> Imprimer</a>
                </p>

                <div>
                    <x-library :library='$society->enterprise->library' class="img200_200" />
                    <a href="{{ route('library.edit', $society->enterprise->library) }}"><i class="fas fa-edit"></i> Editer</a>
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
                                <th>Code</th>
                                <td>{{ $society->enterprise->code }}</td>
                            </tr>
                            <tr>
                                <th>Nom</th>
                                <td>{{ $society->enterprise->name }}</td>
                            </tr>
                            <tr>
                                <th>Téléphone</th>
                                <td><a href="tel:{{ str_replace(' ', '', $society->enterprise->getFullPhoneNumber()) }}">{{ $society->enterprise->getFullPhoneNumber() }}</a></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><a href="mailto:{{ $society->enterprise->email }}">{{ $society->enterprise->email }}</a></td>
                            </tr>
                            <tr>
                                <th>Région</th>
                                <td>{{ $society->enterprise->region->name }}</td>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td>{{ $society->enterprise->address }}</td>
                            </tr>
                            <tr>
                                <th>Code Postal</th>
                                <td>{{ $society->enterprise->postal_code }}</td>
                            </tr>
                            <tr>
                                <th>Pays</th>
                                <td>{{ $society->enterprise->country->name }}</td>
                            </tr>
                            <tr>
                                <th>Région</th>
                                <td>{{ $society->enterprise->region->name }}</td>
                            </tr>
                            <tr>
                                <th>Ville</th>
                                <td>{{ $society->enterprise->city }}</td>
                            </tr>
                            <tr>
                                <th>Site web</th>
                                <td><a target="_blank" href="{{ $society->enterprise->website}}">{{ $society->enterprise->website }}</a></td>
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
                                <td>{{ $society->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $society->updated_at }}</td>
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

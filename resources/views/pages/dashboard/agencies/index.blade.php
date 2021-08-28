@extends('layouts.dashboard', ['title' => 'Liste des Agences'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <a name="" id="" class="btn btn-primary" href="{{ route('agency.create') }}" role="button">Ajouter</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if($agencies->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agencies as $agency)
                                <tr>
                                    <td>{{ $agency->id }}</td>
                                    <td>{{ $agency->enterprise->code }}</td>
                                    <td>{{ $agency->enterprise->name }}</td>
                                    <td>{{ $agency->enterprise->phone_number }}</td>
                                    <td>{{ $agency->enterprise->address }}</td>
                                    <td>
                                        {!! link_to_route('agency.show','Afficher', ['agency' => $agency], ['class' => 'btn '] ) !!}
                                        {!! link_to_route('agency.edit','Editer', ['agency' => $agency], ['class' => 'btn'] ) !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                     <span>No item</span>
                    @endif
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

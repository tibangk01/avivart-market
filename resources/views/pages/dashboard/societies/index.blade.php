@extends('layouts.dashboard', ['title' => 'Liste des sociétes'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    @if($societies->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Code</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Site web</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($societies as $society)
                                <tr>
                                    <td>{{ $society->enterprise->name }}</td>
                                    <td>{{ $society->enterprise->code }}</td>
                                    <td>{{ $society->enterprise->phone_number}}</td>
                                    <td>{{ $society->enterprise->address}}</td>
                                    <td>{{ $society->enterprise->website}}</td>
                                    <td>
                                        {!! link_to_route('society.show','Afficher', ['society' => $society], ['class' => 'btn '] ) !!}
                                        {!! link_to_route('society.edit','Editer', ['society' => $society], ['class' => 'btn'] ) !!}
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

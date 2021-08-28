@extends('layouts.main', ['title' => 'Liste des points de ventes'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <a name="" id="" class="btn btn-primary" href="{{ route('sale_place.create') }}" role="button">Ajouter</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if($sale_places->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Point de vente</th>
                                    <th>Agence</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale_places as $sale_place)
                                <tr>
                                    {{-- <td>{{ $sale_place->id }}</td> --}}
                                    <td>{{ $sale_place->name }}</td>
                                    <td>{{ $sale_place->agency->enterprise->name }}</td>
                                    <td>
                                        {!! link_to_route('sale_place.show','Afficher', ['sale_place' => $sale_place], ['class' => 'btn '] ) !!}
                                        {!! link_to_route('sale_place.edit','Editer', ['sale_place' => $sale_place], ['class' => 'btn'] ) !!}
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

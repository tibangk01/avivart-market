@extends('layouts.dashboard', ['title' => 'Afficher un point de vente'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <a name="" id="" class="btn btn-primary" href="{{ route('sale_place.index') }}" role="button">Retour</a>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                        <tbody>
                            <thead>
                                <td>Code</td>
                                <td>Nom</td>
                            </thead>
                            <tr>
                                <td>{{ $salePlace->id }}</td>
                                <td>{{ $salePlace->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

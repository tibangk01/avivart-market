@extends('layouts.dashboard', ['title' => 'Afficher une agence'])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <a name="" id="" class="btn btn-primary" href="{{ route('agency.index') }}" role="button">Retour</a>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                        <tbody>
                            <thead>
                                <td>Code</td>
                                <td>Nom</td>
                                <td>Téléphone</td>
                                <td>Adresse</td>
                            </thead>
                            <tr>
                                <td>{{ $agency->enterprise->code }}</td>
                                <td>{{ $agency->enterprise->name }}</td>
                                <td>{{ $agency->enterprise->phone_number }}</td>
                                <td>{{ $agency->enterprise->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

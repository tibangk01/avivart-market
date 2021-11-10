 @extends('layouts.dashboard', ['title' => "Point de vente & Staff"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
                                <td>Point de vente</td>
                                <td>{{ $salePlaceStaff->sale_place->enterprise->name }}</td>
                            </tr>
                            <tr>
                                <td>Staff</td>
                                <td>{{ $salePlaceStaff->staff->human->user->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Date de Création</td>
                                <td>{{ $salePlaceStaff->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Date de Modification</td>
                                <td>{{ $salePlaceStaff->updated_at }}</td>
                            </tr>
                            <tr class="table-light">
                                <th>Action</th>
                                <td>
                                    {!! link_to_route('sale_place_staff.edit', 'Editer', ['sale_place_staff' => $salePlaceStaff], ['class' => 'text-warning']) !!}
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
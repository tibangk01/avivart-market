 @extends('layouts.dashboard', ['title' => "Points de vente & Staffs"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste</a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body py-1">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">

                                    <div class="d-flex">
                                        <div class="ml-auto mb-1">
                                            <x-create-record routeName="sale_place_staff.create" />
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped datatable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Point de vente</th>
                                                    <th>Staff</th>
                                                    <th>Date de Création</th>
                                                    <th>Date de Modification</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($salePlaceStaffs as $salePlaceStaff)
                                                    <tr>
                                                        <td>{{ $salePlaceStaff->sale_place->enterprise->name }}</td>
                                                        <td>{{ $salePlaceStaff->staff->human->user->full_name }}</td>
                                                        <td>{{ $salePlaceStaff->created_at }}</td>
                                                        <td>{{ $salePlaceStaff->updated_at }}</td>
                                                        <td class="d-flex flex-row justify-content-around align-items-center">
                                                            <x-show-record routeName="sale_place_staff.show" :routeParam="$salePlaceStaff->id" />
                                                            
                                                            <x-edit-record routeName="sale_place_staff.edit" :routeParam="$salePlaceStaff->id" />

                                                            <x-destroy-record routeName="sale_place_staff.destroy" :routeParam="$salePlaceStaff->id" />
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">Pas d'enregistrements</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>  
</section>
@endsection
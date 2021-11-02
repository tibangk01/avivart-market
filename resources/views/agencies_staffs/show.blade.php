 @extends('layouts.dashboard', ['title' => "Agence & Staff"])

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
                                <td>Agence</td>
                                <td>{{ $agencyStaff->agency->enterprise->name }}</td>
                            </tr>
                            <tr>
                                <td>Staff</td>
                                <td>{{ $agencyStaff->staff->human->user->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Date de création</td>
                                <td>{{ $agencyStaff->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Date de mis à jour</td>
                                <td>{{ $agencyStaff->updated_at }}</td>
                            </tr>
                            <tr class="table-light">
                                <th>Action</th>
                                <td>
                                    {!! link_to_route('agency_staff.edit', 'Editer', ['agency_staff' => $agencyStaff], ['class' => 'text-warning']) !!}
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
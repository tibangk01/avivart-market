<div class="table-responsive">
    <table
        class="table table-bordered table-hover datatable text-nowrap text-center">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Prénoms</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($people as $customer)
                <tr>
                    <td>{{ $customer->person->user->last_name }}</td>
                    <td>{{ $customer->person->user->first_name }}</td>
                    <td>{{ $customer->person->user->phone_number }}</td>
                    <td>{{ $customer->person->user->email }}</td>
                    <td>
                        <a class="btn btn-info btn-xs"
                            href="{{ route('customer.show', $customer) }}?show=person"
                            title="Afficher"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-warning btn-xs"
                            href="{{ route('customer.edit', $customer) }}?edit=person"
                            title="Modifier"><i class="fa fa-edit"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xs"
                            href="{{ route('customer.destroy', $customer) }}?destroy=person"
                            title="Supprimer"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="5">Pas d'enregistrment</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
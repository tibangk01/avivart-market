<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-striped datatable">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>Nom & Prénoms</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($people as $customer)
                <tr>
                    <td><x-library :library='$customer->person->user->library' class="img25_25" /></td>
                    <td>{{ $customer->person->user->full_name }}</td>
                    <td>{{ $customer->person->user->phone_number }}</td>
                    <td>{{ $customer->person->user->email }}</td>
                    <td>
                        <a class="btn btn-info btn-xs"
                            href="{{ route('customer.show', $customer) }}"
                            title="Afficher"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-warning btn-xs"
                            href="{{ route('customer.edit', $customer) }}"
                            title="Modifier"><i class="fa fa-edit"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xs"
                            href="{{ route('customer.destroy', $customer) }}"
                            title="Supprimer"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-dark btn-xs" target="_blank" 
                                                    href="{{ route('customer.printing.one', $customer) }}"
                                                    title="Imprimer"><i class="fa fa-print"
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
<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-striped datatable text-nowrap text-center">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>Code</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Site web</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($corporations as $customer)
                <tr>
                    <td><x-library :library='$customer->corporation->enterprise->library' class="img25_25" /></td>
                    <td>{{ $customer->corporation->enterprise->code }}</td>
                    <td>{{ $customer->corporation->enterprise->name }}</td>
                    <td>{{ $customer->corporation->enterprise->phone_number }}</td>
                    <td>{{ $customer->corporation->enterprise->email }}</td>
                    <td>{{ $customer->corporation->enterprise->address }}</td>
                    <td>{{ $customer->corporation->enterprise->website }}</td>
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
                <td colspan="8">Pas d'enregistrment</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
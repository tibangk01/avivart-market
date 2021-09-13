<div class="table-responsive">
    <table
        class="table table-bordered table-hover datatable text-nowrap text-center">
        <thead class="thead-dark">
            <tr>
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
                    <td>{{ $customer->corporation->enterprise->code }}</td>
                    <td>{{ $customer->corporation->enterprise->name }}</td>
                    <td>{{ $customer->corporation->enterprise->phone_number }}</td>
                    <td>{{ $customer->corporation->enterprise->email }}</td>
                    <td>{{ $customer->corporation->enterprise->address }}</td>
                    <td>{{ $customer->corporation->enterprise->website }}</td>
                    <td>
                        <a class="btn btn-info btn-xs"
                            href="{{ route('customer.show', $customer) }}?show=corporation"
                            title="Afficher"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-warning btn-xs"
                            href="{{ route('customer.edit', $customer) }}?edit=corporation"
                            title="Modifier"><i class="fa fa-edit"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xs"
                            href="{{ route('customer.destroy', $customer) }}?destroy=corporation"
                            title="Supprimer"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7">Pas d'enregistrment</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
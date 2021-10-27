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
                <th>Nom</th>
                <td>{{ $customer->person->user->last_name }}</td>
            </tr>
            <tr>
                <th>Prénoms</th>
                <td>{{ $customer->person->user->first_name }}</td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td>{{ $customer->person->user->phone_number}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $customer->person->user->email }}</td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td>{{ $customer->created_at }}</td>
            </tr>
            <tr>
                <th>Date de mise à jour</th>
                <td>{{ $customer->updated_at }}</td>
            </tr>
            <tr class="table-light">
                <th>Action</th>
                <td>
                    <a class="btn btn-warning btn-xs" href="{{ route('customer.edit', $customer) }}?edit=person" title="Modifier"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    
                    <a class="btn btn-danger btn-xs" href="{{ route('customer.destroy', $customer) }}?destroy=person" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
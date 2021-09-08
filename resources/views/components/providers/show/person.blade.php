<div class="table-responsive bg-white">
    <table class="table table-bordered table-stripped table-hover mb-0">
        <thead class="thead-dark">
            <tr>
                <th>Clé</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Nom</th>
                <td>{{ $provider->person->user->last_name }}</td>
            </tr>
            <tr>
                <th>Prénoms</th>
                <td>{{ $provider->person->user->first_name }}</td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td>{{ $provider->person->user->phone_number}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $provider->person->user->email }}</td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td>{{ $provider->created_at->diffForHumans() }}</td>
            </tr>
            <tr>
                <th>Date de mise à jour</th>
                <td>{{ $provider->updated_at->diffForHumans() }}</td>
            </tr>
            <tr class="table-light">
                <th>Action</th>
                <td>
                    <a class="btn btn-warning btn-xs" href="{{ route('provider.edit', $provider) }}?edit=person" title="Modifier"><i class="fa fa-edit" aria-hidden="true"></i></a>

                    <a class="btn btn-danger btn-xs" href="{{ route('provider.destroy', $provider) }}?destroy=person" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
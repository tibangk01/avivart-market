<div class="table-responsive">
    <table
        class="table table-bordered table-hover datatable text-nowrap text-center">
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
            @forelse ($corporations as $provider)
                <tr>
                    <td><x-library :library='$provider->corporation->enterprise->library' class="img25_25" /></td>
                    <td>{{ $provider->corporation->enterprise->code }}</td>
                    <td>{{ $provider->corporation->enterprise->name }}</td>
                    <td>{{ $provider->corporation->enterprise->phone_number }}</td>
                    <td>{{ $provider->corporation->enterprise->email }}</td>
                    <td>{{ $provider->corporation->enterprise->address }}</td>
                    <td>{{ $provider->corporation->enterprise->website }}</td>
                    <td>
                        <a class="btn btn-info btn-xs"
                            href="{{ route('provider.show', $provider) }}?show=corporation"
                            title="Afficher"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-warning btn-xs"
                            href="{{ route('provider.edit', $provider) }}?edit=corporation"
                            title="Modifier"><i class="fa fa-edit"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xs"
                            href="{{ route('provider.destroy', $provider) }}?destroy=corporation"
                            title="Supprimer"><i class="fa fa-trash"
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
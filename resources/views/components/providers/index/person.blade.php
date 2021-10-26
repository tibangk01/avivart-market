<div class="table-responsive">
    <table
        class="table table-bordered table-hover datatable text-nowrap text-center">
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
            @forelse ($people as $provider)
                <tr>
                    <td><x-library :library='$provider->person->user->library' class="img25_25" /></td>
                    <td>{{ $provider->person->user->full_name }}</td>
                    <td>{{ $provider->person->user->phone_number }}</td>
                    <td>{{ $provider->person->user->email }}</td>
                    <td>
                        <a class="btn btn-info btn-xs"
                            href="{{ route('provider.show', $provider) }}"
                            title="Afficher"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-warning btn-xs"
                            href="{{ route('provider.edit', $provider) }}"
                            title="Modifier"><i class="fa fa-edit"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xs"
                            href="{{ route('provider.destroy', $provider) }}"
                            title="Supprimer"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                        <a class="btn btn-dark btn-xs" target="_blank" 
                                                    href="{{ route('provider.printing.one', $provider) }}"
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
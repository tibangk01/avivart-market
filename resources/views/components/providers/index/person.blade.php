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
            @forelse ($people as $provider)
                <tr>
                    <td><x-library :library='$provider->person->user->library' class="img25_25" /></td>
                    <td>{{ $provider->person->user->full_name }}</td>
                    <td>{{ $provider->person->user->getFullPhoneNumber() }}</td>
                    <td>{{ $provider->person->user->email }}</td>
                    <td class="d-flex flex-row justify-content-around align-items-center">
                        <x-show-record routeName="provider.show" :routeParam="$provider->id" />
                        
                        <x-edit-record routeName="provider.edit" :routeParam="$provider->id" />

                        <x-destroy-record routeName="provider.destroy" :routeParam="$provider->id" />

                        <x-print-one-record routeName="provider.printing.one" :routeParam="$provider->id" />
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
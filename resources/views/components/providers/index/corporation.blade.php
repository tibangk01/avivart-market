<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-striped datatable">
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
                    <td>{{ $provider->corporation->enterprise->getFullPhoneNumber() }}</td>
                    <td>{{ $provider->corporation->enterprise->email }}</td>
                    <td>{{ $provider->corporation->enterprise->address }}</td>
                    <td>{{ $provider->corporation->enterprise->website }}</td>
                    <td class="d-flex flex-row justify-content-around align-items-center">
                        <x-show-record routeName="provider.show" :routeParam="$provider->id" />
                        
                        <x-edit-record routeName="provider.edit" :routeParam="$provider->id" />

                        <x-destroy-record routeName="provider.destroy" :routeParam="$provider->id" />

                        <x-print-one-record routeName="provider.printing.one" :routeParam="$provider->id" />
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
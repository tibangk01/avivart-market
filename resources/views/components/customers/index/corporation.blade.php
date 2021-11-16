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
            @forelse ($corporations as $customer)
                <tr>
                    <td><x-library :library='$customer->corporation->enterprise->library' class="img25_25" /></td>
                    <td>{{ $customer->corporation->enterprise->code }}</td>
                    <td>{{ $customer->corporation->enterprise->name }}</td>
                    <td>{{ $customer->corporation->enterprise->getFullPhoneNumber() }}</td>
                    <td>{{ $customer->corporation->enterprise->email }}</td>
                    <td>{{ $customer->corporation->enterprise->address }}</td>
                    <td>{{ $customer->corporation->enterprise->website }}</td>
                    <td class="d-flex flex-row justify-content-around align-items-center">
                        <x-show-record routeName="customer.show" :routeParam="$customer->id" />
                        
                        <x-edit-record routeName="customer.edit" :routeParam="$customer->id" />

                        <x-destroy-record routeName="customer.destroy" :routeParam="$customer->id" />

                        <x-print-one-record routeName="customer.printing.one" :routeParam="$customer->id" />
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
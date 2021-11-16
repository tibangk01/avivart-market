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
                    <td>{{ $customer->person->user->getFullPhoneNumber() }}</td>
                    <td>{{ $customer->person->user->email }}</td>
                    <td class="d-flex flex-row justify-content-around align-items-center">
                        <x-show-record routeName="customer.show" :routeParam="$customer->id" />
                        
                        <x-edit-record routeName="customer.edit" :routeParam="$customer->id" />

                        <x-destroy-record routeName="customer.destroy" :routeParam="$customer->id" />

                        <x-print-one-record routeName="customer.printing.one" :routeParam="$customer->id" />
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
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
                <th>Code</th>
                <td>{{ $customer->corporation->enterprise->code }}</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>{{ $customer->corporation->enterprise->name }}</td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td>{{ $customer->corporation->enterprise->phone_number}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $customer->corporation->enterprise->email }}</td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td>{{ $customer->corporation->enterprise->address}}</td>
            </tr>
            <tr>
                <th>Site web</th>
                <td><a target="_blank" href="{{ $customer->corporation->enterprise->website}}">{{ $customer->corporation->enterprise->website}}</a></td>
            </tr>
            <tr>
                <th>Code Fiscal</th>
                <td>{{ $customer->corporation->fiscal_code }}</td>
            </tr>
            <tr>
                <th>RCCM</th>
                <td>{{ $customer->corporation->tppcr }}</td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td>{{ $customer->created_at->diffForHumans() }}</td>
            </tr>
            <tr>
                <th>Date de mise à jour</th>
                <td>{{ $customer->updated_at->diffForHumans() }}</td>
            </tr>
            <tr class="table-light">
                <th>Action</th>
                <td>
                    <a class="btn btn-warning btn-xs" href="{{ route('customer.edit', $customer) }}?edit=corporation" title="Modifier"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    
                    <a class="btn btn-danger btn-xs" href="{{ route('customer.destroy', $customer) }}?destroy=corporation" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
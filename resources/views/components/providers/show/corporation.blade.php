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
                <th>Code</th>
                <td>{{ $provider->corporation->enterprise->code }}</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>{{ $provider->corporation->enterprise->name }}</td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td>{{ $provider->corporation->enterprise->phone_number}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $provider->corporation->enterprise->email }}</td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td>{{ $provider->corporation->enterprise->address}}</td>
            </tr>
            <tr>
                <th>Site web</th>
                <td><a target="_blank" href="{{ $provider->corporation->enterprise->website}}">{{ $provider->corporation->enterprise->website}}</a></td>
            </tr>
            <tr>
                <th>Code Fiscal</th>
                <td>{{ $provider->corporation->fiscal_code }}</td>
            </tr>
            <tr>
                <th>RCCM</th>
                <td>{{ $provider->corporation->tppcr }}</td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td>{{ $provider->created_at }}</td>
            </tr>
            <tr>
                <th>Date de mise à jour</th>
                <td>{{ $provider->updated_at }}</td>
            </tr>
            <tr class="table-light">
                <th>Action</th>
                <td>
                    <a class="btn btn-warning btn-xs" href="{{ route('provider.edit', $provider) }}?edit=corporation" title="Modifier"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    
                    <a class="btn btn-danger btn-xs" href="{{ route('provider.destroy', $provider) }}?destroy=corporation" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
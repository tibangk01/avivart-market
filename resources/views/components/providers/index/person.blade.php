<div class="table-responsive">
                                        <table
                                            class="table table-bordered table-hover datatable text-nowrap text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prénoms</th>
                                                    <th>Téléphone</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($people as $provider)
                                                    <tr>
                                                        <td>{{ $provider->person->user->last_name }}</td>
                                                        <td>{{ $provider->person->user->first_name }}</td>
                                                        <td>{{ $provider->person->user->phone_number }}</td>
                                                        <td>{{ $provider->person->user->email }}</td>
                                                        <td>
                                                            <a class="btn btn-info btn-xs"
                                                                href="{{ route('provider.show', $provider) }}?show=person"
                                                                title="Afficher"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-warning btn-xs"
                                                                href="{{ route('provider.edit', $provider) }}?edit=person"
                                                                title="Modifier"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="btn btn-danger btn-xs"
                                                                href="{{ route('provider.destroy', $provider) }}?destroy=person"
                                                                title="Supprimer"><i class="fa fa-trash"
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
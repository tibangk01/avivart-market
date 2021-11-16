{!! Form::open(['class' => 'delete-form', 'method' => 'DELETE', 'route' => [$routeName, $routeParam]]) !!}
    <button type="submit" class="btn btn-danger btn-xs" title="Supprimer">
        <i class="fa fa-trash"></i>
    </button>
{!! Form::close() !!}
<table class="table table-responsive" id="historiales-table">
    <thead>
        <tr>
            <th>Total Cobrado</th>
            <th>Cuotas</th>
            <th>Observación</th>
            <th>Persona</th>
            <th>Usuario</th>
            <th>Prestamos</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($historiales as $historial)
        <tr>
            <td>{!! $historial->total_cobrado !!}</td>
            <td>{!! $historial->cuotas !!}</td>
            <td>{!! $historial->observacion !!}</td>
            <td>{!! $historial->persona->nombres !!}</td>
            <td>{!! $historial->user->name !!}</td>
            <td>{!! $historial->prestamos_id !!}</td>
            <td>
                {!! Form::open(['route' => ['historiales.destroy', $historial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('historiales.show', [$historial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('historiales.edit', [$historial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
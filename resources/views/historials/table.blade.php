<table class="table table-responsive" id="historials-table">
    <thead>
        <tr>
            <th>Total Cobrado</th>
        <th>Cuotas</th>
        <th>Observacion</th>
        <th>Personas Id</th>
        <th>Users Id</th>
        <th>Prestamos Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($historials as $historial)
        <tr>
            <td>{!! $historial->total_cobrado !!}</td>
            <td>{!! $historial->cuotas !!}</td>
            <td>{!! $historial->observacion !!}</td>
            <td>{!! $historial->personas_id !!}</td>
            <td>{!! $historial->users_id !!}</td>
            <td>{!! $historial->prestamos_id !!}</td>
            <td>
                {!! Form::open(['route' => ['historials.destroy', $historial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('historials.show', [$historial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('historials.edit', [$historial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-responsive" id="prestamos-table">
    <thead>
        <tr>
        <th>Prestamo</th>
        <th>Valor a Cobrar</th>
        <th>Dia Cobro</th>
        <th>Dia Solicitud</th>
        <th>Cuotas</th>
        <th>Valor Cuota</th>
        <th>Observacion</th>
        <th>Personas Id</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($prestamos as $prestamo)
        <tr>
            <td>{!! $prestamo->prestamo !!}</td>
            <td>{!! $prestamo->total_cobrar !!}</td>
            <td>{!! $prestamo->dia_cobro !!}</td>
            <td>{!! $prestamo->dia_solicitud !!}</td>
            <td>{!! $prestamo->cuotas !!}</td>
            <td>{!! $prestamo->valor_cuota !!}</td>
            <td>{!! $prestamo->observacion !!}</td>
            <td>{!! $prestamo->persona->nombres !!}</td>
            <td>
                {!! Form::open(['route' => ['prestamos.destroy', $prestamo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('prestamos.show', [$prestamo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('prestamos.edit', [$prestamo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
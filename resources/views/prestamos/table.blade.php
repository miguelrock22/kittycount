<table class="table table-responsive" id="prestamos-table">
    <thead>
        <tr>
        <th>Cliente</th>
        <th>Prestamo</th>
        <th>Valor Cuota</th>
        <th>Dia Cobro</th>
        <th>Dia Solicitud</th>
        <th>Cuotas</th>
        <th>Valor a Cobrar</th>
        <th>Cobrador</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($prestamos as $prestamo)
        <tr>
            <td>{!! $prestamo->persona->nombres !!}</td>
            <td>$ {!! number_format($prestamo->prestamo) !!}</td>
            <td>$ {!! number_format($prestamo->valor_cuota) !!}</td>
            <td>{!! date('d-m-Y', strtotime($prestamo->dia_cobro)) !!}</td>
            <td>{!! date('d-m-Y', strtotime($prestamo->dia_solicitud)) !!}</td>
            <td>{!! $prestamo->cuotas !!}</td>
            <td>$ {!! number_format($prestamo->total_cobrar) !!}</td>
            <td>{!! $prestamo->user->name !!}</td>
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
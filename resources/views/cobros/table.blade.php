<table class="table table-responsive" id="prestamos-table">
<thead>
    <tr>
    <th>Cliente</th>
    <th>Valor Cuota</th>
    <th>Dia Cobro</th>
        <th colspan="3">Acción</th>
    </tr>
</thead>
<tbody>
@foreach($prestamos as $prestamo)
    <tr>
        <td>{!! $prestamo->persona->nombres !!}</td>
        <td>$ {!! number_format($prestamo->valor_cuota) !!}</td>
        <td>{!! date('d-m-Y', strtotime($prestamo->dia_cobro)) !!}</td>
        <td>
            {!! Form::open(['route' => ['cobros.destroy', $prestamo->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('cobros.edit', [$prestamo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach
</tbody>
</table>
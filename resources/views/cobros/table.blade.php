<table class="table table-responsive" id="prestamos-table">
<thead>
    <tr>
    <th>Cliente</th>
    <th>Dirección</th>
    <th>Valor Cuota</th>
    <th>Dia Cobro</th>
        <th colspan="3">Acción</th>
    </tr>
</thead>
<tbody>
@foreach($prestamos as $prestamo)
    <tr>
        <td>{!! $prestamo->persona->nombres !!}</td>
        <td>{!! $prestamo->persona->direccion_casa !!}</td>
        @if((strtotime($prestamo->dia_cobro) >= strtotime("-2 days")) && (strtotime($prestamo->dia_cobro) <= strtotime("+1 days")))
            <td>${!! number_format($prestamo->valor_cuota) !!}</td>
            <td>{!! date('d-m-Y', strtotime($prestamo->dia_cobro)) !!}</td>
        @else
            <td>${!! number_format($prestamo->valor_cuota_2) !!}</td>
            <td>{!! date('d-m-Y', strtotime($prestamo->dia_cobro_2)) !!}</td>
        @endif
        <td>
            {!! Form::open(['route' => ['cobros.destroy', $prestamo->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('cobros.edit', [$prestamo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach
<tr>
<td>Abonos</td>
<td>--</td>
<td>--</td>
<td>--</td>
<td>--</td>
</tr>
@foreach($abonos as $abono)
    <tr>
        <td>{!! $abono->persona->nombres !!}</td>
        <td>{!! $abono->persona->direccion_casa !!}</td>
        <td>{!! $abono->persona->user->name !!}</td>
        <td>${!! number_format($abono->deuda_abono) !!}</td>
        <td>{!! date('d-m-Y', strtotime($abono->dia_cobro_abono)) !!}</td>
        <td>
            {!! Form::open(['route' => ['cobros.destroy', $abono->prestamos_id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('cobros.edit', [$abono->prestamos_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach
<tr>
<td>Cobros realizados</td>
<td>--</td>
<td>--</td>
<td>--</td>
<td>--</td>
</tr>
@foreach($historial as $h)
    <tr class="success">
        <td>{!! $h->persona->nombres !!}</td>
        <td>{!! $h->persona->direccion_casa !!}</td>
        <td>${!! number_format($h->total_cobrado) !!}</td>
        <td></td>
        <td></td>
        <td>
            ---
        </td>
    </tr>
@endforeach
</tbody>
</table>
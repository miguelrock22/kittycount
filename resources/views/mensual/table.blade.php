<?php $val = 0 ?>
<table class="table table-responsive" id="mensual-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Fecha 2do cobro</th>
            <th>Cuota</th>
            <th>Cuota 2</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reporteNoPago as $rep)
            <tr class="danger">
                <td>{!! $rep->nombres !!}</td>
                <td>{!! $rep->dia_cobro !!}</td>
                <td>{!! $rep->dia_cobro_2 !!}</td>
                <td>${!! number_format($rep->valor_cuota) !!}</td>
                <td>${!! number_format($rep->valor_cuota_2) !!}</td>
                <?php $val += ($rep->valor_cuota + $rep->valor_cuota_2); ?>
            </tr>
        @endforeach
        <tr>
            <td>Total deuda</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td class="danger">${!! number_format($val) !!}</td>
        </tr>
        <?php $val = 0 ?>
        @foreach($pagos as $rep)
            <tr class="success">
                <td>{!! $rep->nombres !!}</td>
                <td>{!! date('Y-m-d',strtotime($rep->created_at)) !!}</td>
                <td>---</td>
                <td>${!! number_format($rep->total_cobrado) !!}</td>
                <td>---</td>
                <?php $val += ($rep->total_cobrado); ?>
            </tr>
        @endforeach
        <tr>
            <td>Total cobrado</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td class="success">${!! number_format($val) !!}</td>
        </tr>
    </tbody>
</table>
@section('scripts')
<script>
    $('#mensual-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
        "processing": true,
        "language": {
            "url": "{{asset('plugins/datatables/Spanish.json')}}"
        }
    });
</script>
@endsection

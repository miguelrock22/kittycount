<!-- Id Field -->
<div class="col-md-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $historial->id !!}</p>
</div>

<!-- Prestamos Id Field -->
<div class="col-md-4">
    {!! Form::label('prestamos_id', 'Prestamos Id:') !!}
    <p>{!! $historial->prestamos_id !!}</p>
</div>

<!-- Users Id Field -->
<div class="col-md-4">
    {!! Form::label('users_id', 'Cobrador:') !!}
    <p>{!! $historial->user->name !!}</p>
</div>

<!-- Personas Id Field -->
<div class="col-md-4">
    {!! Form::label('personas_id', 'Clientes:') !!}
    <p>{!! $historial->persona->nombres !!}</p>
</div>

<!-- Total Cobrado Field -->
<div class="col-md-4">
    {!! Form::label('total_cobrado', 'Total Cobrado:') !!}
    <p>${!! number_format($historial->total_cobrado) !!}</p>
</div>

<!-- deuda abono Field -->
<div class="col-md-4">
    {!! Form::label('deuda_abono', 'Deuda abono:') !!}
    <p>${!! number_format($historial->deuda_abono) !!}</p>
</div>

<!-- Dia Cobro abono Field -->
<div class="col-md-4">
    {!! Form::label('dia_cobro', 'Día Cobro:') !!}
    <p>{!! date('d-m-Y',strtotime($historial->dia_cobro_abono)) !!}</p>
</div>

<!-- Observacion Field -->
<div class="col-md-4">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{!! $historial->observacion !!}</p>
</div>

<!-- Created At Field -->
<div class="col-md-4">
    {!! Form::label('created_at', 'Día de cobro:') !!}
    <p>{!! $historial->created_at !!}</p>
</div>


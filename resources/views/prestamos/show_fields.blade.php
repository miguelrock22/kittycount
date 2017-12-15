<!-- Id Field -->
<div class="col-md-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $prestamo->id !!}</p>
</div>

<!-- Personas Id Field -->
<div class="col-md-4">
    {!! Form::label('personas_id', 'Cliente') !!}
    <p>{!! $prestamo->persona->nombres !!}</p>
</div>

<!-- Users Id Field -->
<div class="col-md-4">
    {!! Form::label('users_id', 'Cobrador') !!}
    <p>{!! $prestamo->user->name !!}</p>
</div>

<!-- Prestamo Field -->
<div class="col-md-4">
    {!! Form::label('prestamo', 'Prestamo:') !!}
    <p>${!! number_format($prestamo->prestamo) !!}</p>
</div>

<!-- Dia Solicitud Field -->
<div class="col-md-4">
    {!! Form::label('dia_solicitud', 'Día Solicitud:') !!}
    <p>{!! date('d-m-Y',strtotime($prestamo->dia_solicitud)) !!}</p>
</div>

<!-- Cuotas Field -->
<div class="col-md-4">
    {!! Form::label('cuotas', 'Cuotas') !!}
    <p>{!! $prestamo->cuotas !!}</p>
</div>

<!-- Dia Cobro Field -->
<div class="col-md-4">
    {!! Form::label('dia_cobro', 'Día Cobro:') !!}
    <p>{!! date('d-m-Y',strtotime($prestamo->dia_cobro)) !!}</p>
</div>

@if($prestamo->dia_cobro_2 != null)
<!-- Dia Cobro Field -->
<div class="col-md-4">
    {!! Form::label('dia_cobro_2', 'Día segundo cobro:') !!}
    <p>{!! date('d-m-Y',strtotime($prestamo->dia_cobro_2)) !!}</p>
</div>
@endif

<!-- Valor Cuota Field -->
<div class="col-md-4">
    {!! Form::label('valor_cuota', 'Valor Cuota:') !!}
    <p>${!! number_format($prestamo->valor_cuota) !!}</p>
</div>

@if($prestamo->valor_cuota_2 != 0)
<!-- Valor Cuota Field -->
<div class="col-md-4">
    {!! Form::label('valor_cuota_2', 'Valor segunda cuota:') !!}
    <p>${!! number_format($prestamo->valor_cuota_2) !!}</p>
</div>
@endif

<!-- Estado Field -->
<div class="col-md-4">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $prestamo->estado == 1 ? 'Activo' : 'Inactivo' !!}</p>
</div>

<!-- Total Cobrar Field -->
<div class="col-md-4">
    {!! Form::label('abono_capital', 'Abono al capital:') !!}
    <p>${!! number_format($prestamo->abono_capital) !!}</p>
</div>

<!-- Observacion Field -->
<div class="col-md-4">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{!! $prestamo->observacion !!}</p>
</div>
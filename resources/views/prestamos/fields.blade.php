
<!-- Personas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Cedula Cliente:') !!}
    {!! Form::select('personas_id', $personas, null, ['class' => 'form-control select2']) !!}
</div>

<!-- Prestamo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prestamo', 'Valor a prestar:') !!}
    {!! Form::number('prestamo', null, ['class' => 'form-control']) !!}
</div>

<!-- Porcentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('porcentage', 'Porcentage:') !!}
    {!! Form::number('porcentage', 10, ['class' => 'form-control', 'max' => 100, 'min' => 0]) !!}
</div>

<!-- Dia Cobro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia_cobro', 'Día Cobro:') !!}
    {!! Form::date('dia_cobro', null, ['class' => 'form-control']) !!}
</div>

<!-- Dia Solicitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia_solicitud', 'Día Solicitud:') !!}
    {!! Form::date('dia_solicitud',date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('estado', false) !!}
        {!! Form::checkbox('estado', '1', null) !!}
    </label>
</div>

<!-- Cuotas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuotas', 'Número de cuotas:') !!}
    {!! Form::number('cuotas', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Cuota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_cuota', 'Valor Cuota:') !!}
    {!! Form::number('valor_cuota', null, ['class' => 'form-control', 'step' => 20000]) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('prestamos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

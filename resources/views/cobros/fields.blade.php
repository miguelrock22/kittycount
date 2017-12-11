<!-- Total Cobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cobrado', 'Total Cobrado:') !!}
    {!! Form::number('total_cobrado', $prestamo->valor_cuota, ['class' => 'form-control']) !!}
</div>

{!! Form::hidden('cuotas', 1, ['class' => 'form-control']) !!}

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Personas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Personas Id:') !!}
    {!! Form::select('personas_id',[$prestamo->persona->id => $prestamo->persona->nombres],null, ['class' => 'form-control', 'disabled' => true]) !!}
</div>

<!-- Users Id Field -->
{!! Form::hidden('users_id', $prestamo->user->id, ['class' => 'form-control']) !!}

<!-- Prestamos Id Field -->
{!! Form::hidden('prestamos_id', $prestamo->id, ['class' => 'form-control']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cobros.index') !!}" class="btn btn-default">Cancelar</a>
</div>

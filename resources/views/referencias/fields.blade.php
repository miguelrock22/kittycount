<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Dirección Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_casa', 'Dirección:') !!}
    {!! Form::text('direccion_casa', null, ['class' => 'form-control']) !!}
</div>

<!-- Dirección trabajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_trabajo', 'Dirección trabajo:') !!}
    {!! Form::text('direccion_trabajo', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefonos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefonos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_trabajo', 'Teléfono trabajo:') !!}
    {!! Form::text('telefono_trabajo', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefonos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', 'Celular:') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>

<?php $parentesco['Amig@'] = 'Amig@'; ?>
<!-- Parentesco Field -->
<div class="form-group col-sm-6">
{!! Form::label('parentesco', '2. Parentesco:') !!}
{!! Form::select('parentesco',$parentesco, null, ['class' => 'form-control']) !!}
</div>

<!-- Personas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Cedula Cliente:') !!}
    {!! Form::select('personas_id', $personas, null, ['class' => 'form-control select2','placeholder'=>'Seleccione']) !!}
</div>

<!-- Codeudores Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codeudores_id', 'Codeudores Id:') !!}
    {!! Form::select('codeudores_id', $codeudor, null, ['class' => 'form-control','placeholder'=>'Seleccione']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('referencias.index') !!}" class="btn btn-default">Cancelar</a>
</div>

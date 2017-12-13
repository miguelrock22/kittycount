<!-- Prestamos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Cédula Cliente:') !!}
    {!! Form::select('personas_id', $personas, null, ['class' => 'form-control select2','placeholder'=>'Seleccione']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Cobrador:') !!}
    {!! Form::select('users_id', $movil, null, ['class' => 'form-control select2','placeholder'=>'Seleccione']) !!}
</div>

<!-- Total Cobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cobrado', 'Total Cobrado:') !!}
    {!! Form::text('total_cobrado', null, ['class' => 'form-control price-field']) !!}
</div>

<!-- Cuotas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuotas', 'Cuotas:') !!}
    {!! Form::text('cuotas', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Prestamos Id Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('prestamos_id', 'Identificador Prestamos:') !!}
    {!! Form::number('prestamos_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('historiales.index') !!}" class="btn btn-default">Cancelar</a>
</div>

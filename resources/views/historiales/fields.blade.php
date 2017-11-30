<!-- Total Cobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cobrado', 'Total Cobrado:') !!}
    {!! Form::number('total_cobrado', null, ['class' => 'form-control']) !!}
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

<!-- Personas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Personas Id:') !!}
    {!! Form::number('personas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Prestamos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prestamos_id', 'Prestamos Id:') !!}
    {!! Form::number('prestamos_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('historiales.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<!-- Id Field -->
<div class="col-md-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $referencia->id !!}</p>
</div>

<!-- Nombres Field -->
<div class="col-md-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{!! $referencia->nombres !!}</p>
</div>

<!-- Direccion Field -->
<div class="col-md-4">
    {!! Form::label('direccion_casa', 'Dirección casa:') !!}
    <p>{!! $referencia->direccion_casa !!}</p>
</div>

<!-- Direccion trabajo Field -->
<div class="col-md-4">
    {!! Form::label('direccion_trabajo', 'Dirección trabajo:') !!}
    <p>{!! $referencia->direccion_trabajo !!}</p>
</div>

<!-- Telefonos Field -->
<div class="col-md-4">
    {!! Form::label('telefonos', 'Teléfono:') !!}
    <p>{!! $referencia->telefono !!}</p>
</div>

<!-- Telefono trabajo Field -->
<div class="col-md-4">
    {!! Form::label('telefono_trabajo', 'Teléfono trabajo:') !!}
    <p>{!! $referencia->telefono_trabajo !!}</p>
</div>

<!-- celular Field -->
<div class="col-md-4">
    {!! Form::label('celular', 'Celular:') !!}
    <p>{!! $referencia->celular !!}</p>
</div>

<!-- Parentesco Field -->
<div class="col-md-4">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    <p>{!! $referencia->parentesco !!}</p>
</div>

<!-- Personas Id Field -->
@if($referencia->personas_id != null)
<div class="col-md-4">
    {!! Form::label('personas_id', 'Cliente asociado:') !!}
    <p>{!! $referencia->persona->nombres !!}</p>
</div>
@endif

<!-- Codeudores Id Field -->
@if($referencia->codeudores_id != null)
<div class="col-md-4">
    {!! Form::label('codeudores_id', 'Codeudor asociado:') !!}
    <p>{!! $referencia->codeudor->nombres !!}</p>
</div>
@endif

<!-- Created At Field -->
<div class="col-md-4">
    {!! Form::label('created_at', 'Día de registro:') !!}
    <p>{!! $referencia->created_at !!}</p>
</div>

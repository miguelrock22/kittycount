<!-- Cedula Field -->
<div class="form-group col-sm-6">
    <sup>*</sup>{!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control', 'required' => true]) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    <sup>*</sup>{!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control', 'required' => true]) !!}
</div>

<!-- Direccion Casa Field -->
<div class="form-group col-sm-6">
    <sup>*</sup>{!! Form::label('direccion_casa', 'Direccion Casa:') !!}
    {!! Form::text('direccion_casa', null, ['class' => 'form-control', 'required' => true]) !!}
</div>

<!-- Direccion Trabajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_trabajo', 'Direccion Trabajo:') !!}
    {!! Form::text('direccion_trabajo', null, ['class' => 'form-control']) !!}
</div>

<!-- Oficio Field -->
<div class="form-group col-sm-6">
    <sup>*</sup>{!! Form::label('oficio', 'Oficio:') !!}
    {!! Form::text('oficio', null, ['class' => 'form-control', 'required' => true]) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', 'Celular:') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_cedula', 'Url Cedula:') !!}
    {!! Form::text('url_cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Carta Laboral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_carta_laboral', 'Url Carta Laboral:') !!}
    {!! Form::text('url_carta_laboral', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
{!! Form::hidden('user_id', $user, ['class' => 'form-control']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personas.index') !!}" class="btn btn-default">Cancel</a>
</div>

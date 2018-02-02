<!-- Id Field -->
<div class="col-md-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $codeudor->id !!}</p>
</div>

<!-- Cedula Field -->
<div class="col-md-4">
    {!! Form::label('cedula', 'Cédula:') !!}
    <p>{!! $codeudor->cedula !!}</p>
</div>

<!-- Nombres Field -->
<div class="col-md-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{!! $codeudor->nombres !!}</p>
</div>

<!-- Direccion Casa Field -->
<div class="col-md-4">
    {!! Form::label('direccion_casa', 'Direccion Casa:') !!}
    <p>{!! $codeudor->direccion_casa !!}</p>
</div>

<!-- Direccion Trabajo Field -->
<div class="col-md-4">
    {!! Form::label('direccion_trabajo', 'Direccion Trabajo:') !!}
    <p>{!! $codeudor->direccion_trabajo !!}</p>
</div>

<!-- Oficio Field -->
<div class="col-md-4">
    {!! Form::label('oficio', 'Oficio:') !!}
    <p>{!! $codeudor->oficio !!}</p>
</div>

<!-- Telefono Field -->
<div class="col-md-4">
    {!! Form::label('telefono', 'Teléfono:') !!}
    <p>{!! $codeudor->telefono !!}</p>
</div>

<!-- Celular Field -->
<div class="col-md-4">
    {!! Form::label('celular', 'Celular:') !!}
    <p>{!! $codeudor->celular !!}</p>
</div>

<!-- Personas Id Field -->
<div class="col-md-4">
    {!! Form::label('personas_id', 'Cliente asociado:') !!}
    <p>{!! $codeudor->persona->nombres !!}</p>
</div>

<!-- Created At Field -->
<div class="col-md-4">
    {!! Form::label('created_at', 'Día de registro') !!}
    <p>{!! $codeudor->created_at !!}</p>
</div>

<!-- Url Cedula Field -->
<div class="col-md-4">
    {!! Form::label('url_cedula', 'Cédula:') !!}
    <img src="{{ url('/') }}/{!! $persona->url_cedula !!}" class="img-responsive" />
</div>

<!-- Url Carta Laboral Field -->
<div class="col-md-4">
    {!! Form::label('url_carta_laboral', 'Carta Laboral:') !!}
    <img src="{{ url('/') }}/{!! $persona->url_carta_laboral !!}" class="img-responsive" />
</div>
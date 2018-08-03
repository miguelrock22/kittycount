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
@if(!empty($codeudor->url_cedula))
    <div class="col-md-4">
        {!! Form::label('url_cedula', 'Cédula:') !!}
    @switch($codeudor->typeCC)
        @case('jpeg')
        @case('jpg')
        @case('png')
        @case('bmp')
            <img style="max-width:50%" src="{{ url('/') }}/{!! $codeudor->url_cedula !!}" class="img-responsive" />
            @break
    @endswitch
        <a href="{{ url('/') }}/{!! $codeudor->url_cedula !!}" download>Descargar</a>
    </div>
@endif
@if(!empty($codeudor->url_carta_laboral))
    <!-- Url Carta Laboral Field -->
    <div class="col-md-4">
        {!! Form::label('url_carta_laboral', 'Carta Laboral:') !!}
    @switch($codeudor->typeCL)
        @case('jpeg')
        @case('jpg')
        @case('png')
        @case('bmp')
        <img style="max-width:50%" src="{{ url('/') }}/{!! $codeudor->url_carta_laboral !!}" class="img-responsive" />
        @break
    @endswitch
    <a href="{{ url('/') }}/{!! $codeudor->url_carta_laboral !!}" download>Descargar</a>
</div>
@endif
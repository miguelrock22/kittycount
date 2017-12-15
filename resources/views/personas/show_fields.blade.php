<section>
    <!-- Id Field -->
    <div class="col-md-4">
        {!! Form::label('id', 'Id:') !!}
        <p>{!! $persona->id !!}</p>
    </div>

    <!-- Cedula Field -->
    <div class="col-md-4">
        {!! Form::label('cedula', 'Cédula:') !!}
        <p>{!! $persona->cedula !!}</p>
    </div>

    <!-- Nombres Field -->
    <div class="col-md-4">
        {!! Form::label('nombres', 'Nombres:') !!}
        <p>{!! $persona->nombres !!}</p>
    </div>

    <!-- Direccion Casa Field -->
    <div class="col-md-4">
        {!! Form::label('direccion_casa', 'Dirección Casa:') !!}
        <p>{!! $persona->direccion_casa !!}</p>
    </div>

    <!-- Direccion Trabajo Field -->
    <div class="col-md-4">
        {!! Form::label('direccion_trabajo', 'Dirección Trabajo:') !!}
        <p>{!! $persona->direccion_trabajo !!}</p>
    </div>
    
    <!-- Direccion Trabajo Field -->
    <div class="col-md-4">
        {!! Form::label('lugar_trabajo', 'Lugar Trabajo:') !!}
        <p>{!! $persona->lugar_trabajo !!}</p>
    </div>

    <!-- Oficio Field -->
    <div class="col-md-4">
        {!! Form::label('oficio', 'Oficio:') !!}
        <p>{!! $persona->oficio !!}</p>
    </div>

    <!-- Telefono Field -->
    <div class="col-md-4">
        {!! Form::label('telefono', 'Teléfono:') !!}
        <p>{!! $persona->telefono !!}</p>
    </div>
    
    <!-- Telefono Field -->
    <div class="col-md-4">
        {!! Form::label('telefono_trabajo', 'Teléfono trabajo:') !!}
        <p>{!! $persona->telefono_trabajo !!}</p>
    </div>

    <!-- Celular Field -->
    <div class="col-md-4">
        {!! Form::label('celular', 'Celular:') !!}
        <p>{!! $persona->celular !!}</p>
    </div>

    <!-- Url Cedula Field -->
    <div class="col-md-4">
        {!! Form::label('url_cedula', 'Cédula:') !!}
        <p>{!! $persona->url_cedula !!}</p>
    </div>

    <!-- Url Carta Laboral Field -->
    <div class="col-md-4">
        {!! Form::label('url_carta_laboral', 'Carta Laboral:') !!}
        <p>{!! $persona->url_carta_laboral !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="col-md-4">
        {!! Form::label('created_at', 'Dia de registro') !!}
        <p>{!! $persona->created_at !!}</p>
    </div>
</section>
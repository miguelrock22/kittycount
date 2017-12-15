<section>
    <!-- Id Field -->
    <div class="col-md-4">
        {!! Form::label('id', 'Id:') !!}
        <p>{!! $persona->id !!}</p>
    </div>

    <!-- Cedula Field -->
    <div class="col-md-4">
        {!! Form::label('cedula', 'Cedula:') !!}
        <p>{!! $persona->cedula !!}</p>
    </div>

    <!-- Nombres Field -->
    <div class="col-md-4">
        {!! Form::label('nombres', 'Nombres:') !!}
        <p>{!! $persona->nombres !!}</p>
    </div>

    <!-- Direccion Casa Field -->
    <div class="col-md-4">
        {!! Form::label('direccion_casa', 'Direccion Casa:') !!}
        <p>{!! $persona->direccion_casa !!}</p>
    </div>

    <!-- Direccion Trabajo Field -->
    <div class="col-md-4">
        {!! Form::label('direccion_trabajo', 'Direccion Trabajo:') !!}
        <p>{!! $persona->direccion_trabajo !!}</p>
    </div>

    <!-- Oficio Field -->
    <div class="col-md-4">
        {!! Form::label('oficio', 'Oficio:') !!}
        <p>{!! $persona->oficio !!}</p>
    </div>

    <!-- Telefono Field -->
    <div class="col-md-4">
        {!! Form::label('telefono', 'Telefono:') !!}
        <p>{!! $persona->telefono !!}</p>
    </div>

    <!-- Celular Field -->
    <div class="col-md-4">
        {!! Form::label('celular', 'Celular:') !!}
        <p>{!! $persona->celular !!}</p>
    </div>

    <!-- Url Cedula Field -->
    <div class="col-md-4">
        {!! Form::label('url_cedula', 'Url Cedula:') !!}
        <p>{!! $persona->url_cedula !!}</p>
    </div>

    <!-- Url Carta Laboral Field -->
    <div class="col-md-4">
        {!! Form::label('url_carta_laboral', 'Url Carta Laboral:') !!}
        <p>{!! $persona->url_carta_laboral !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="col-md-4">
        {!! Form::label('user_id', 'User Id:') !!}
        <p>{!! $persona->user_id !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="col-md-4">
        {!! Form::label('created_at', 'Dia de registro') !!}
        <p>{!! $persona->created_at !!}</p>
    </div>
</section>
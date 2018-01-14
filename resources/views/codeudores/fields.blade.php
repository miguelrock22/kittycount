
<!-- Personas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Cedula Cliente:') !!}
    {!! Form::select('personas_id', $personas, null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione','required' => true]) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Casa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_casa', 'Direccion Casa:') !!}
    {!! Form::text('direccion_casa', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Trabajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_trabajo', 'Direccion Trabajo:') !!}
    {!! Form::text('direccion_trabajo', null, ['class' => 'form-control']) !!}
</div>

<!-- Oficio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oficio', 'Oficio:') !!}
    {!! Form::text('oficio', null, ['class' => 'form-control']) !!}
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
<div class="form-group col-sm-4">
    {!! Form::label('url_cedula', 'Cédula:') !!}
    {!! Form::file('url_cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Carta Laboral Field -->
<div class="form-group col-sm-4">
    {!! Form::label('url_carta_laboral', 'Carta Laboral:') !!}
    {!! Form::file('url_carta_laboral', null, ['class' => 'form-control']) !!}
</div>

@if(!isset($codeudor))

<!-- Referencias Section -->
<div class="col-md-12">
<h3>Referencias personales</h3>
</div>

<div class="form-group col-sm-12">
    <div class="row">
        <!-- Nombres Field -->
        <div class="form-group col-sm-4">
        <sup>*</sup> {!! Form::label('nombres_pers_1', '1. Nombres:') !!}
            {!! Form::text('nombres_pers_1', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>

        <!-- Dirección Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_casa_pers_1', '1. Dirección:') !!}
            {!! Form::text('direccion_casa_pers_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección trabajo Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_trabajo_pers_1', '1. Dirección trabajo:') !!}
            {!! Form::text('direccion_trabajo_pers_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_pers_1', '1. Teléfono:') !!}
            {!! Form::text('telefono_pers_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_trabajo_pers_1', '1. Teléfono trabajo:') !!}
            {!! Form::text('telefono_trabajo_pers_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('celular_pers_1', '1. Celular:') !!}
            {!! Form::text('celular_pers_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Parentesco Field -->
        {!! Form::hidden('parentesco_pers_1', "Amig@", ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <!-- Nombres Field -->
        <div class="form-group col-sm-4">
        <sup>*</sup> {!! Form::label('nombres_pers_2', '2. Nombres:') !!}
            {!! Form::text('nombres_pers_2', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>

        <!-- Dirección Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_casa_pers_2', '2. Dirección:') !!}
            {!! Form::text('direccion_casa_pers_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección trabajo Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_trabajo_pers_2', '2. Dirección trabajo:') !!}
            {!! Form::text('direccion_trabajo_pers_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_pers_2', '2. Teléfono:') !!}
            {!! Form::text('telefono_pers_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_trabajo_pers_2', '2. Teléfono trabajo:') !!}
            {!! Form::text('telefono_trabajo_pers_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('celular_pers_2', '2. Celular:') !!}
            {!! Form::text('celular_pers_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Parentesco Field -->
        {!! Form::hidden('parentesco_pers_2', "Amig@", ['class' => 'form-control']) !!}
    </div>

    </div>
    <div class="col-md-12">
    <h3>Referencias familiares</h3>
    </div>
    <div class="form-group col-sm-12">
    <div class="row">
        <!-- Nombres Field -->
        <div class="form-group col-sm-4">
        <sup>*</sup> {!! Form::label('nombres_fam_1', '1. Nombres:') !!}
            {!! Form::text('nombres_fam_1', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>

        <!-- Dirección Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_casa_fam_1', '1. Dirección:') !!}
            {!! Form::text('direccion_casa_fam_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección trabajo Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_trabajo_fam_1', '1. Dirección trabajo:') !!}
            {!! Form::text('direccion_trabajo_fam_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_fam_1', '1. Teléfono:') !!}
            {!! Form::text('telefono_fam_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_trabajo_fam_1', '1. Teléfono trabajo:') !!}
            {!! Form::text('telefono_trabajo_fam_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('celular_fam_1', '1. Celular:') !!}
            {!! Form::text('celular_fam_1', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Parentesco Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('parentesco_fam_1', '1. Parentesco:') !!}
            {!! Form::select('parentesco_fam_1', $parentesco, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <!-- Nombres Field -->
        <div class="form-group col-sm-4">
        <sup>*</sup> {!! Form::label('nombres_fam_2', '2. Nombres:') !!}
            {!! Form::text('nombres_fam_2', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>

        <!-- Dirección Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_casa_fam_2', '2. Dirección:') !!}
            {!! Form::text('direccion_casa_fam_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección trabajo Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_trabajo_fam_2', '2. Dirección trabajo:') !!}
            {!! Form::text('direccion_trabajo_fam_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_fam_2', '2. Teléfono:') !!}
            {!! Form::text('telefono_fam_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_trabajo_fam_2', '2. Teléfono trabajo:') !!}
            {!! Form::text('telefono_trabajo_fam_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('celular_fam_2', '2. Celular:') !!}
            {!! Form::text('celular_fam_2', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Parentesco Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('parentesco_fam_2', '2. Parentesco:') !!}
            {!! Form::select('parentesco_fam_2', $parentesco, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('codeudores.index') !!}" class="btn btn-default">Cancelar</a>
</div>
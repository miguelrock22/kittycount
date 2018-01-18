
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
    <a class="btn btn-default pull-right add-ref-pers">Agregar</a>
</div>

<div class="form-group col-sm-12 personales">
    <div class="row ref-pers hidden">
        <div class="form-group">
            <h4 class="countref"></h4>
            <a class="btn btn-danger pull-right" onclick="$(this).parent().parent().remove()"><i class="fa fa-times"></i></a>
        </div>
        <!-- Nombres Field -->
        <div class="form-group col-sm-4">
        <sup>*</sup> {!! Form::label('nombres_pers', 'Nombres:') !!}
            {!! Form::text('nombres_pers', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_casa_pers', 'Dirección:') !!}
            {!! Form::text('direccion_casa_pers', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección trabajo Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_trabajo_pers', 'Dirección trabajo:') !!}
            {!! Form::text('direccion_trabajo_pers', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_pers', 'Teléfono:') !!}
            {!! Form::text('telefono_pers', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_trabajo_pers', 'Teléfono trabajo:') !!}
            {!! Form::text('telefono_trabajo_pers', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('celular_pers', 'Celular:') !!}
            {!! Form::text('celular_pers', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Parentesco Field -->
        {!! Form::hidden('parentesco_pers', "Amig@", ['class' => 'form-control', 'id' => 'parentesco_pers']) !!}
    </div>
</div>
<div class="col-md-12">
    <h3>Referencias familiares</h3>
    <a class="btn btn-default pull-right add-ref-fam">Agregar</a>
</div>
<div class="form-group col-sm-12 familiares">
    <div class="row hidden ref-fam">
        <div class="form-group">
            <h4 class="countref"></h4>
            <a class="btn btn-danger pull-right" onclick="$(this).parent().parent().remove()"><i class="fa fa-times"></i></a>
        </div>
        <!-- Nombres Field -->
        <div class="form-group col-sm-4">
        <sup>*</sup> {!! Form::label('nombres_fam', 'Nombres:') !!}
            {!! Form::text('nombres_fam', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_casa_fam', 'Dirección:') !!}
            {!! Form::text('direccion_casa_fam', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dirección trabajo Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_trabajo_fam', 'Dirección trabajo:') !!}
            {!! Form::text('direccion_trabajo_fam', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_fam', 'Teléfono:') !!}
            {!! Form::text('telefono_fam', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_trabajo_fam', 'Teléfono trabajo:') !!}
            {!! Form::text('telefono_trabajo_fam', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Telefonos Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('celular_fam', 'Celular:') !!}
            {!! Form::text('celular_fam', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Parentesco Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('parentesco_fam', 'Parentesco:') !!}
            {!! Form::select('parentesco_fam', $parentesco, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('codeudores.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script>
    $('document').ready(function(){
        $('.add-ref-pers').click(function(){
            var row = $(".ref-pers").clone();
            var count = $('.cloned_pers').length;
            row.removeClass('hidden ref-pers').addClass('cloned_pers');
            row.find('.countref').text((count + 1));
            row.find('#nombres_pers').attr('required',true);
            row.find('input').each(function(co, i){
                var name = $(i).attr('id');
                $(i).attr('id',name+"_"+(count+1)).attr('name',name+"_"+(count+1));
            });
            $('.personales').append(row);
        });
        $('.add-ref-fam').click(function(){
            var row = $(".ref-fam").clone();
            var count = $('.cloned_fam').length;
            row.removeClass('hidden ref-fam').addClass('cloned_fam');
            row.find('.countref').text((count + 1));
            row.find('#nombres_fam').attr('required',true);
            var nSelect = row.find('select').attr('id');
            row.find('select').attr('id',nSelect+"_"+(count+1)).attr('name',nSelect+"_"+(count+1));
            row.find('input').each(function(co, i){
                var name = $(i).attr('id');
                $(i).attr('id',name+"_"+(count+1)).attr('name',name+"_"+(count+1));
            });
            $('.familiares').append(row);
        });
    });
</script>
@endsection
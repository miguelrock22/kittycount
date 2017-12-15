
<!-- Personas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Cedula Cliente:') !!}
    {!! Form::select('personas_id', $personas, null, ['class' => 'form-control select2','placeholder'=>'Seleccione']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Cobrador:') !!}
    {!! Form::select('users_id', $movil, null, ['class' => 'form-control select2','placeholder'=>'Seleccione']) !!}
</div>

<!-- Prestamo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prestamo_val', 'Valor a prestar:') !!}
    {!! Form::text('prestamo_val', (isset($prestamo) ? $prestamo->prestamo : 0 ), ['class' => 'form-control price-field']) !!}
</div>
{!! Form::hidden('prestamo',null,['id' => 'prestamo']) !!}

<!-- Cuotas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuotas', 'Número de cuotas:') !!}
    {!!  Form::select('cuotas',[1 => 1,2=>2],null, ['class' => 'form-control']) !!}
</div>

<!-- Dia Cobro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia_cobro', 'Día Cobro:') !!}
    {!! Form::date('dia_cobro', (isset($prestamo) ? date('Y-m-d',strtotime($prestamo->dia_cobro)) : 0 ), ['class' => 'form-control']) !!}
</div>

<!-- Dia Cobro 2 Field -->
<div class="form-group {!! (isset($prestamo->dia_cobro_2) ? '' : 'hidden' ) !!} col-sm-6">
    {!! Form::label('dia_cobro_2', 'Segundo Día de Cobro:') !!}
    {!! Form::date('dia_cobro_2', (isset($prestamo->dia_cobro_2) ? date('Y-m-d',strtotime($prestamo->dia_cobro_2)) : 0 ), ['class' => 'form-control','id'=>'dia_cobro_2']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('asignar_cuota', 'Asignar cuota:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('asignar_cuota') !!}
    </label>
</div>

<div class="hidden cuotas">
    <!-- Cuota 1 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('valor_cuota_val', 'Valor primera cuota:') !!}
        {!! Form::text('valor_cuota_val', (isset($prestamo) ? $prestamo->valor_cuota : 0 ), ['class' => 'form-control price-field']) !!}
    </div>
    {!! Form::hidden('valor_cuota',null,['id' => 'valor_cuota']) !!}
    <!-- Cuota 2 Field -->
    <div class="form-group {!! (isset($prestamo->valor_cuota_2) ? '' : 'hidden' ) !!} col-sm-6">
        {!! Form::label('valor_cuota_2_val', 'Valor segunda cuota:') !!}
        {!! Form::text('valor_cuota_2_val', (isset($prestamo) ? $prestamo->valor_cuota_2 : 0 ), ['class' => 'form-control price-field']) !!}
    </div>
    {!! Form::hidden('valor_cuota_2',null,['id' => 'valor_cuota_2']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Prestamo Field -->
<div class="form-group col-sm-6 {!! (isset($prestamo) ? '' : 'hidden') !!}">
    {!! Form::label('abono_capital_val', 'Abono al capital:') !!}
    {!! Form::text('abono_capital_val', (isset($prestamo) ? $prestamo->abono_capital : 0 ), ['class' => 'form-control price-field']) !!}
</div>
{!! Form::hidden('abono_capital',null,['id' => 'abono_capital']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('prestamos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script>
$('document').ready(function(){
	$("#cuotas").change(function(){
		if($(this).val() == 1){
			$("#dia_cobro_2").parent().addClass('hidden');
			$("#valor_cuota_2").parent().addClass('hidden');
        }
		else{
			$("#dia_cobro_2").parent().removeClass("hidden");
            $("#valor_cuota_2_val").parent().removeClass('hidden');
        }
    });
    $("#asignar_cuota").change(function(){
        if($(this).prop('checked') === false)
            $(".cuotas").addClass("hidden");
        else
            $(".cuotas").removeClass("hidden");

    });
    $('form').submit(function(){
        $("#prestamo").val($("#prestamo_val").unmask());
        $("#valor_cuota").val($("#valor_cuota_val").unmask());
        $("#valor_cuota_2").val($("#valor_cuota_2_val").unmask());
        $("#abono_capital").val($("#abono_capital_val").unmask());
    });
});
</script>
@endsection

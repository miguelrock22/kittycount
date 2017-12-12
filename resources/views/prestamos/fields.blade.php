
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
    {!! Form::label('prestamo', 'Valor a prestar:') !!}
    {!! Form::number('prestamo', null, ['class' => 'form-control']) !!}
</div>

<!-- Cuotas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuotas', 'Número de cuotas:') !!}
    {!!  Form::select('cuotas',[1 => 1,2=>2],null, ['class' => 'form-control']) !!}
</div>


<!-- Dia Cobro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia_cobro', 'Día Cobro:') !!}
    {!! Form::date('dia_cobro', null, ['class' => 'form-control']) !!}
</div>

<!-- Dia Cobro 2 Field -->
<div class="form-group hidden col-sm-6">
    {!! Form::label('dia_cobro_2"', 'Segundo Día de Cobro:') !!}
    {!! Form::date('dia_cobro_2', null, ['class' => 'form-control','id'=>'dia_cobro_2']) !!}
</div>

<!-- Dia Solicitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia_solicitud', 'Día Solicitud:') !!}
    {!! Form::date('dia_solicitud',date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('estado', false) !!}
        {!! Form::checkbox('estado', '1', null) !!}
    </label>
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('prestamos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script>
$('document').ready(function(){
	$("#cuotas").change(function(){
		if($(this).val() == 1)
			$("#dia_cobro_2").parent().addClass('hidden');
		else
			$("#dia_cobro_2").parent().removeClass("hidden");
	});
    $("#personas_id,#users_id").select2();
});
</script>
@endsection

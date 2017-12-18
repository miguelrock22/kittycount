@if((strtotime($prestamo->dia_cobro) >= strtotime("-2 days")) && (strtotime($prestamo->dia_cobro) <= strtotime("+1 days")))
{!! Form::hidden('cuota',1) !!}
@else
{!! Form::hidden('cuota',1) !!}
@endif

{!! Form::hidden('historial_id',$historial_id) !!}

<!-- Personas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Cliente:') !!}
    {!! Form::select('personas_id',[$prestamo->persona->id => $prestamo->persona->nombres],null, ['class' => 'form-control']) !!}
</div>

<!-- Total Cobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cobrado', 'Total Cobrado:') !!}
    {!! Form::text('total_cobrado', $prestamo->valor_cuota, ['class' => 'form-control price-field']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('abono', 'Abono:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('abono') !!}
    </label>
</div>

<!-- Dia Cobro Field -->
<div class="form-group col-sm-6 dia-cobro hidden">
    {!! Form::label('dia_cobro_abono', 'Día de cobro') !!}
    {!! Form::date('dia_cobro_abono', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
{!! Form::hidden('users_id', $prestamo->user->id) !!}

<!-- Prestamos Id Field -->
{!! Form::hidden('prestamos_id', $prestamo->id) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cobros.index') !!}" class="btn btn-default">Cancelar</a>
</div>
@section('scripts')
<script>
$('document').ready(function(){
    $("#abono").change(function(){
        if($(this).prop('checked') === false)
            $(".dia-cobro").addClass("hidden");
        else
            $(".dia-cobro").removeClass("hidden");
    });
    $('form').submit(function(){
        $("#total_cobrado").val($("#total_cobrado").unmask());
    });
});
</script>
@endsection
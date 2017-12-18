<!-- Prestamos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personas_id', 'Cédula Cliente:') !!}
    {!! Form::select('personas_id', $personas, null, ['class' => 'form-control select2','placeholder'=>'Seleccione']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Cobrador:') !!}
    {!! Form::select('users_id', $movil, null, ['class' => 'form-control select2','placeholder'=>'Seleccione']) !!}
</div>

<!-- Total Cobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cobrado', 'Total Cobrado:') !!}
    {!! Form::text('total_cobrado', null, ['class' => 'form-control price-field']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('historiales.index') !!}" class="btn btn-default">Cancelar</a>
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
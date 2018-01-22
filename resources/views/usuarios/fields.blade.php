<!-- name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','required' => true]) !!}
</div>

<!-- email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','required' => true]) !!}
</div>

<!-- roles -->
<div class="form-group col-sm-6">
    {!! Form::label('rol_id', 'Rol:') !!}
    {!! Form::select('rol_id', $roles, null, ['class' => 'form-control','placeholder'=>'Seleccione','required' => true]) !!}
</div>

@if(isset($user))
<div class="form-group col-sm-6">
    {!! Form::label('change_pass', 'Cambiar contraseña?') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('change_pass') !!}
    </label>
</div>
@endif

@if(isset($user))
<div id="div_pass" class="hidden">
@endif
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control','required' => true]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('con_password', 'Confirmar Contraseña:') !!}
    {!! Form::password('con_password', ['class' => 'form-control','required' => true]) !!}
</div>
@if(isset($user))
</div>
@endif

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('usuarios.index') !!}" class="btn btn-default">Cancelar</a>
</div>


@section('scripts')
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("con_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("las contraseñas no coinciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

$('document').ready(function(){
    if($('#change_pass').length > 0){
        $("#password, #con_password").removeAttr('required');
    }

    $('#change_pass').click(function(){
        div_pass = $("#div_pass");
        if(div_pass.hasClass("hidden"))
            div_pass.removeClass('hidden');
        else
            div_pass.addClass('hidden');
    });

});

</script>
@endsection
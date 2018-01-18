<!-- Id Field -->
<div class="col-md-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Nombres Field -->
<div class="col-md-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Direccion Field -->
<div class="col-md-4">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>
<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{!! route('personas.index') !!}"><i class="fa fa-edit"></i><span>Personas</span></a>
</li>

<li class="{{ Request::is('codeudors*') ? 'active' : '' }}">
    <a href="{!! route('codeudors.index') !!}"><i class="fa fa-edit"></i><span>Codeudors</span></a>
</li>

<li class="{{ Request::is('referencias*') ? 'active' : '' }}">
    <a href="{!! route('referencias.index') !!}"><i class="fa fa-edit"></i><span>Referencias</span></a>
</li>

<li class="{{ Request::is('prestamos*') ? 'active' : '' }}">
    <a href="{!! route('prestamos.index') !!}"><i class="fa fa-edit"></i><span>Prestamos</span></a>
</li>

<li class="{{ Request::is('historials*') ? 'active' : '' }}">
    <a href="{!! route('historials.index') !!}"><i class="fa fa-edit"></i><span>Historials</span></a>
</li>


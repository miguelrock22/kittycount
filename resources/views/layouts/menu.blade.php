<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{!! route('personas.index') !!}"><i class="fa fa-user" aria-hidden="true"></i><span>Personas</span></a>
</li>

<li class="{{ Request::is('codeudores*') ? 'active' : '' }}">
    <a href="{!! route('codeudores.index') !!}"><i class="fa fa-users" aria-hidden="true"></i><span>Codeudores</span></a>
</li>

<li class="{{ Request::is('referencias*') ? 'active' : '' }}">
    <a href="{!! route('referencias.index') !!}"><i class="fa fa-users" aria-hidden="true"></i><span>Referencias</span></a>
</li>

<li class="{{ Request::is('prestamos*') ? 'active' : '' }}">
    <a href="{!! route('prestamos.index') !!}"><i class="fa fa-money" aria-hidden="true"></i><span>Prestamos</span></a>
</li>

<li class="{{ Request::is('historiales*') ? 'active' : '' }}">
    <a href="{!! route('historiales.index') !!}"><i class="fa fa-history" aria-hidden="true"></i><span>Historiales</span></a>
</li>


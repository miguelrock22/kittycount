<li class="{{ Request::is('admin/personas*') ? 'active' : '' }}">
    <a href="{!! route('personas.index') !!}"><i class="fa fa-user" aria-hidden="true"></i><span>Personas</span></a>
</li>

<li class="{{ Request::is('admin/codeudores*') ? 'active' : '' }}">
    <a href="{!! route('codeudores.index') !!}"><i class="fa fa-users" aria-hidden="true"></i><span>Codeudores</span></a>
</li>

<li class="{{ Request::is('admin/referencias*') ? 'active' : '' }}">
    <a href="{!! route('referencias.index') !!}"><i class="fa fa-users" aria-hidden="true"></i><span>Referencias</span></a>
</li>

<li class="{{ Request::is('admin/prestamos*') ? 'active' : '' }}">
    <a href="{!! route('prestamos.index') !!}"><i class="fa fa-money" aria-hidden="true"></i><span>Prestamos</span></a>
</li>

<li class="{{ Request::is('admin/historiales*') ? 'active' : '' }}">
    <a href="{!! route('historiales.index') !!}"><i class="fa fa-history" aria-hidden="true"></i><span>Historiales</span></a>
</li>

<li class="{{ Request::is('admin/informes*') ? 'active' : '' }}">
    <a href="{!! route('informes.index') !!}"><i class="fa fa-line-chart" aria-hidden="true"></i><span>Informes</span></a>
</li>


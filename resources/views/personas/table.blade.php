<table class="table table-responsive" id="personas-table">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Dirección Casa</th>
            <th>Oficio</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Prestamista</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->nombres !!}</td>
            <td>{!! $persona->direccion_casa !!}</td>
            <td>{!! $persona->oficio !!}</td>
            <td>{!! $persona->telefono !!}</td>
            <td>{!! $persona->celular !!}</td>
            <td>{!! $persona->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('personas.show', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('personas.edit', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
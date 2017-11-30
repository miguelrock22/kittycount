<table class="table table-responsive" id="personas-table">
    <thead>
        <tr>
            <th>Cedula</th>
        <th>Nombres</th>
        <th>Direccion Casa</th>
        <th>Direccion Trabajo</th>
        <th>Oficio</th>
        <th>Telefono</th>
        <th>Celular</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->cedula !!}</td>
            <td>{!! $persona->nombres !!}</td>
            <td>{!! $persona->direccion_casa !!}</td>
            <td>{!! $persona->direccion_trabajo !!}</td>
            <td>{!! $persona->oficio !!}</td>
            <td>{!! $persona->telefono !!}</td>
            <td>{!! $persona->celular !!}</td>
            <td>
                {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personas.show', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('personas.edit', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
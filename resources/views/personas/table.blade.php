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
<<<<<<< HEAD
        <th>Url Cedula</th>
        <th>Url Carta Laboral</th>
        <th>Usuario</th>
=======
>>>>>>> f34c27ae02159c031c196c58d37d44a8b4e46fb7
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
<<<<<<< HEAD
            <td>{!! $persona->url_cedula !!}</td>
            <td>{!! $persona->url_carta_laboral !!}</td>
            <td>{!! $persona->user->name !!}</td>
=======
>>>>>>> f34c27ae02159c031c196c58d37d44a8b4e46fb7
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
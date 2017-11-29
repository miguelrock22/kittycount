<table class="table table-responsive" id="codeudors-table">
    <thead>
        <tr>
            <th>Cedula</th>
        <th>Nombres</th>
        <th>Direccion Casa</th>
        <th>Direccion Trabajo</th>
        <th>Oficio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Personas Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($codeudors as $codeudor)
        <tr>
            <td>{!! $codeudor->cedula !!}</td>
            <td>{!! $codeudor->nombres !!}</td>
            <td>{!! $codeudor->direccion_casa !!}</td>
            <td>{!! $codeudor->direccion_trabajo !!}</td>
            <td>{!! $codeudor->oficio !!}</td>
            <td>{!! $codeudor->telefono !!}</td>
            <td>{!! $codeudor->celular !!}</td>
            <td>{!! $codeudor->personas_id !!}</td>
            <td>
                {!! Form::open(['route' => ['codeudors.destroy', $codeudor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('codeudors.show', [$codeudor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('codeudors.edit', [$codeudor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
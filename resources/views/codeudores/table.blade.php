<table class="table table-responsive" id="codeudores-table">
    <thead>
        <tr>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Dirección Casa</th>
        <th>Dirección Trabajo</th>
        <th>Oficio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Personas</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($codeudores as $codeudor)
        <tr>
            <td>{!! $codeudor->cedula !!}</td>
            <td>{!! $codeudor->nombres !!}</td>
            <td>{!! $codeudor->direccion_casa !!}</td>
            <td>{!! $codeudor->direccion_trabajo !!}</td>
            <td>{!! $codeudor->oficio !!}</td>
            <td>{!! $codeudor->telefono !!}</td>
            <td>{!! $codeudor->celular !!}</td>
            <td>{!! !isset($codeudor->persona->nombres) ? "-" : $codeudor->persona->nombres !!}</td>
            <td>
                {!! Form::open(['route' => ['codeudores.destroy', $codeudor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('codeudores.show', [$codeudor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('codeudores.edit', [$codeudor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
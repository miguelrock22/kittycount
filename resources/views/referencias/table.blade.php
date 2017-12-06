<table class="table table-responsive" id="referencias-table">
    <thead>
        <tr>
            <th>Nombres</th>
        <th>Telefonos</th>
        <th>Parentesco</th>
        <th>Persona</th>
        <th>Codeudor</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($referencias as $referencia)
        <tr>
            <td>{!! $referencia->nombres !!}</td>
            <td>{!! $referencia->telefonos !!}</td>
            <td>{!! $referencia->parentesco !!}</td>
            <td>{!! !isset($referencia->persona->nombres) ? "-": $referencia->persona->nombres !!}</td>
            <td>{!! !isset($referencia->codeudor->nombres) ? "-": $referencia->codeudor->nombres !!}</td>
            <td>
                {!! Form::open(['route' => ['referencias.destroy', $referencia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('referencias.show', [$referencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('referencias.edit', [$referencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
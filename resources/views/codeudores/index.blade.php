@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">codeudores</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('codeudores.create') !!}">Agregar nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('codeudores.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
@section('scripts')
<script>
    urlCodDatatables = '{{ route('datatablecod') }}';
    $('#codeudores-table').DataTable({
        "lengthMenu": [[10,20,30, -1], [10,20,30, "Todos"]],
        "processing": true,
        "serverSide": true,
        "ajax": $.fn.dataTable.pipeline( {
            url: urlCodDatatables,
            pages: 5 // number of pages to cache
        }),
        "language": {
            "url": "{{asset('plugins/datatables/Spanish.json')}}"
        },
        "columns":[
            {data:'nombres'},
            {data:'direccion_casa'},
            {data:'oficio'},
            {data:'telefono'},
            {data:'celular'},
            {data:'persona.nombres'},
            {data:'id',"orderable": false, "render":function(data, type, row, meta) {

                return '<form method="POST" action="'+row.action+'" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="'+row.token+'"><div class="btn-group">'+
                    '<a href="'+row.show+'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>'+
                    '<a href="'+row.edit+'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'+
                    '<button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button></div></form>';
            }}
        ],
    });
</script>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Personas</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('personas.create') !!}">Agregar nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('personas.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
@section('scripts')
<script>
    urlPerDatatables = '{{ route('datatableper') }}';
    $('#personas-table').DataTable({
        "lengthMenu": [[10,20,30, -1], [10,20,30, "Todos"]],
        "processing": true,
        "serverSide": true,
        "ajax": $.fn.dataTable.pipeline( {
            url: urlPerDatatables,
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
            {data:'id',"orderable": false, "render":function(data, type, row, meta) {

                return '<div class="btn-group">'+
                    '<a href="'+row.show+'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>'+
                    '<a href="'+row.edit+'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'+
                    '</div>';
            }}
        ],
    });
</script>
@endsection


@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">historiales</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('historiales.create') !!}">Agregar nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('historiales.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
@section('scripts')
<script>
    urlHisDatatables = '{{ route('datatablehis') }}';
    $('#historiales-table').DataTable({
        "lengthMenu": [[10,20,30, -1], [10,20,30, "Todos"]],
        "processing": true,
        "serverSide": true,
        "ajax": $.fn.dataTable.pipeline( {
            url: urlHisDatatables,
            pages: 5 // number of pages to cache
        }),
        "language": {
            "url": "{{asset('plugins/datatables/Spanish.json')}}"
        },
        "columns":[
            {data:'persona.nombres'},
            {data:'user.name'},
            {data:'total_cobrado',render: $.fn.dataTable.render.number( ',', '.', 0 , '$')},
            {data:'observacion'},
            {data:'created_at'},
            {data:'id', "render":function(data, type, row, meta) {

                return '<form method="POST" action="'+row.action+'" accept-charset="UTF-8"><input name="_token" type="hidden" value="'+row.token+'"><div class="btn-group">'+
                    '<a href="'+row.show+'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>'+
                    '<a href="'+row.edit+'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'+
                    '<button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button></div></form>';
            }}
        ],
    });
</script>
@endsection
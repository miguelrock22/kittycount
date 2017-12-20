@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Infomes</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('informes.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
@section('scripts')
<script>
    urlInfDatatables = '{{ route('datatableinf') }}';
    $('#informes-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
        "paging":false,
        "processing": true,
        "serverSide": true,
        "ajax": urlInfDatatables,
        "language": {
            "url": "{{asset('plugins/datatables/Spanish.json')}}"
        },
        "columns":[
            {data:'nombres'},
            {data:'prestamo',render: $.fn.dataTable.render.number( ',', '.', 0 , '$')},
            {data:'intereses',className:'info',render: $.fn.dataTable.render.number( ',', '.', 0 , '$')},
            {data:'dia_solicitado'}
        ],
        "drawCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            var sumRow = $('<tr/>').attr('role','row').addClass("success").html('<td>Total:</td><td class="price-field">'+pageTotal+'</td><td class="price-field">'+total+'</td><td></td>')
            $("#informes-table tbody").append(sumRow);
            $('.price-field').priceFormat({
                centsLimit: 0,
                prefix: '$'
            });
        }
    });
</script>
@endsection

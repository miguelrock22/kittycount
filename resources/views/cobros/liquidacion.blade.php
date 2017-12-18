@extends('layouts.appcobros')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Liquidación {!! date('d-m-Y') !!}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-responsive" id="prestamos-table">
                    <thead>
                        <tr>
                        <th>Cliente</th>
                        <th>Total cobrado</th>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        @foreach($historial as $h)
                            <tr>
                                <td>{!! $h->persona->nombres !!}</td>
                                <td>${!! number_format($h->total_cobrado) !!}</td>
                            </tr>
                            <?php $total += $h->total_cobrado; ?>
                        @endforeach
                        <tr class="success">
                            <td>Total:</td>
                            <td>${!! number_format($total) !!}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">
            <a href="{!! route('cobros.index') !!}">Volver</a>
        </div>
    </div>
@endsection


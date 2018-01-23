@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Informe mensual</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            {!! Form::open(['route' => 'mensual.index','method'=>'GET']) !!}
                <!-- Dia inicial -->
                <div class="form-group col-sm-4">
                    {!! Form::label('dia_ini', 'Día inicial:') !!}
                    {!! Form::date('dia_ini', null, ['class' => 'form-control','required' => true]) !!}
                </div>
                <!-- Dia final -->
                <div class="form-group col-sm-4">
                    {!! Form::label('dia_fin', 'Día final:') !!}
                    {!! Form::date('dia_fin', null, ['class' => 'form-control','required' => true]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            <div class="box-body">
                    @include('mensual.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

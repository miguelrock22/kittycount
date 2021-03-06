@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Codeudor
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'codeudores.store', 'files'=>true]) !!}

                        @include('codeudores.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

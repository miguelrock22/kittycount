@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Referencia
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('referencias.show_fields')
                    <div class="col-md-10 text-center">
                        <a href="{!! route('referencias.index') !!}" class="btn btn-default">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

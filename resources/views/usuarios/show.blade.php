@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Usuario
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('usuarios.show_fields')
                    <div class="col-md-10 text-center">
                        <a href="{!! route('usuarios.index') !!}" class="btn btn-default">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
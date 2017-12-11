@extends('layouts.appcobros')

@section('content')
    <section class="content-header">
        <h1>
            Cobros
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($prestamo, ['route' => ['cobros.store']]) !!}

                        @include('cobros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
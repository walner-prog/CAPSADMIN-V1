{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar etiqueta </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
    
       @if (session('info'))
           <div class="alert alert-success">
           <strong>{{ session('info') }}</strong>
          </div>
        @endif

        <div class="card">
            <div class="card-body text-success">
                {!! Form::model($tag,['route' =>['admin.tags.update', $tag], 'method' => 'put' ]) !!}
                @include('admin.tags.partial.form')
                
                {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @stop
    
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
    </section>
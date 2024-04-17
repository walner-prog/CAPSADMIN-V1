{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Permiso</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
              
                    <div class="container">
                       
                        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nombre del Permiso:</label>
                                <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Permiso</button>
                        </form>
                    </div>
            
                
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
@extends('layouts.app')

@section('title','El juego de la Historia - Editar')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col mt-5">
        <form action="/juegos/{{$juego->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h4>Editar el Juego</h4>
            <div class="form-group">
                <label for="nombre">Título:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="{{$juego->nombre}}">
                @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" value="{{$juego->descripcion}}">
                @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image_profile">Imagen</label>
                <input type="file" class="form-control-file" name="image_profile" id="image_profile">
            </div>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
            {{-- @include('layouts.errors') --}}
        </form>
        <form class="my-3" action="/juegos/{{$juego->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar juego</button>
        </form>
                <a class="infoJuegoCreado" href="/juegos/{{$juego->id}}"> ← Atras</a>
        <br><br>

        <a class="infoJuegoCreado" href="/juegos">Inicio</a>
    </div>
</div>

@endsection

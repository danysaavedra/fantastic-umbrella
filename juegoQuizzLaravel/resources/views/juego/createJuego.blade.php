@extends('layouts.app')

@section('title','El juego de la Historia - Crear')

@section('content')


<div class="row justify-content-center mt-5">
    <div class="col-6 juegoCreate">
        <div class="col-2">
            <img src="{{url('/img/tetris.png')}}" class="imagenTetris" alt="no image">
        </div>
        <form action="/juegos" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Crear Juego</h4>

            <div class="form-group">
                <label for="nombre">Titulo</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="{{old('nombre')}}">
                @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" value="{{old('descripcion')}}">
                @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image_profile">Imagen del Juego</label>
                <input type="file" class="form-control-file" name="image_profile" id="image_profile" placeholder="">
            </div>

            <button type="submit" class="btn btn-success">CREAR</button>
            {{-- @include('layouts.errors') --}}
        </form><br>
        <a class="infoJuegoCreado" href="/juegos">Inicio</a>
    </div>


</div>


@endsection

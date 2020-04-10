@extends('layouts.app')

@section('title','El juego de la Historia - Admin')

@section('content')
<form style="margin-top:100px;" class="form-inline" action="/admin" method="POST">
    @csrf
    <div style="width:100%;" class="md-form">
        <input style="width:100%;" type="text" class="form-control py-4" name="email" placeholder="Buscar usuario por E-mail" aria-label="Search">
    </div>
    <button id="buttonCheck" class="btn btn-primary col-3 mt-2" type="submit">Buscar</button>
</form>

@isset($user)

@if($user == '')
<h4 class="display-4 text-center mt-5">No se encuentran coincidencias</h1>

    @else
    <div class="row justify-content-center">
        <div class="col mt-5">
            <form action="/admin/converter/{{$user->id}}" method="post">
                @csrf
                <div class="card text-center">
                    <div class="card-header">
                        <h4>Usuario encontrado</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <img style="width:200px; height: 170px; display:block; margin:auto; border-radius: 50%;" src="/storage/images/{{$user->image_profile}}" alt="" class="img-fluid">
                        @if($user->admin == 0)
                        <button type="submit" class="btn btn-primary mt-3">Convertir en administrador</button>
                        @endif
                        @if($user->admin == 1)
                        <button type="submit" class="btn btn-primary mt-3">Convertir a usuario sin acceso</button>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        @if($user->admin == 0)
                        <p>No es admin</p>
                        @else
                        <p>Es admin</p>
                        @endif
                    </div>
                </div>
            </form>
            @if(Auth::user()->id != $user->id)
            <form action="admin/eliminar/{{$user->id}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Eliminar usuario</button>
            </form>
            @endif
        </div>
    </div>
    @endif
    @endisset

    @if (session('message'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('message')}}</strong>
    </div>
    @endif
    @endsection

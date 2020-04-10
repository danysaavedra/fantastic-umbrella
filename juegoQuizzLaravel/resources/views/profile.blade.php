@extends('layouts.app')

@section('title','El juego de la Historia - Perfil')

@section('content')

<div class="row justify-content-center">

    <div class="col-12">
        <div class="card registerCardProfile">
            <div class="card-header perfilHeader">{{ __('Cambio de Perfil') }}</div>

            <div class="card-body">
                <form method="POST" action="/profile" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-4">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" autocomplete="name" autofocus>

                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}" autocomplete="email">

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Viejo') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div> --}}

            {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nuevo Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div> --}}
        <div class="form-group row">
            {{-- <label for="image_profile" class="col-md-4 col-form-label text-md-right">Avatar</label>
            <div class="col-md-6">
                <img style="width:200px;" src="/storage/images/{{$user->image_profile}}" alt="" class="img-fluid">
            </div>


            <br><label for="image_profile" class="col-md-4 col-form-label text-md-right"></label><br>

            <div class="col-md-6 mt-3">
                <input type="file" name="image_profile"> --}}
                <div class="form-group row mt-3">
                    <div class="row col-6 col-md-4 offset-md-4 ml-3">
                        <button type="submit" class="btn row" id="buttonCheck"><i class="fas fa-save"></i>
                            {{ __('Guardar cambios') }}
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>
</div>
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{session('message')}}</strong>
</div>

@endif
</div>
</div>
<form action="profile/eliminar/{{$user->id}}" method="post" class="mt-2">
@csrf
    <button type="submit" class="btn" id="buttonCheck" style="background:red;"><i class="far fa-trash-alt"></i>
        {{ __('Eliminar cuenta') }}
    </button>
</form>
@endsection

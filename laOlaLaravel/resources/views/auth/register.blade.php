
@extends('layouts.plantilla')

@section('contenido')
<div class="reg">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('- REGISTRATE -') }}</h4></div>

                <div class="card-body">
                    <form name="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="col-form-label text-md-left">{{ __('Nombre') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lastname" class="col-form-label text-md-left">{{ __('Apellido') }}</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-left">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-left">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label text-md-left">{{ __('Confirmar contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="foto">Subir imagen:</label>

                              <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror">
                              @error('foto')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarme') }}
                                </button>


                            </div>
                        </div>

                     <!--   <div class="col-12">
                            <div class="col-sm-6">
                                <a href="/login/facebook" class="btn btn-info">Ingresar con Facebook</a>
                            </div>
                        </div>
                    -->
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/register.js"></script>
@endsection

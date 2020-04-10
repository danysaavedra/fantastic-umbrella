
@extends('layouts.plantilla')

@section('contenido')

<div class="log">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>{{ __('- LOGIN -') }}</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-left">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-left">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                       
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Loguearse') }}
                                </button>
                            </div>
                        </div>

                        <div class="col-12">
                                <div class="form-group">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!--
                        <div class="col-12">
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
<script type="text/javascript" src="/js/login.js">

</script>
@endsection

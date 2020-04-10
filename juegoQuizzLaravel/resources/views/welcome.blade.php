@extends('layouts.app')

@section('title','El juego de la Historia - Home')

@section('content')
<div class="jumbotron homeCard row">
    <h1 class="display-2 welcomeTitulo col-lg-6 col-12">¡MOMENTO DE <br> PRACTICAR!</h1>
    @if(!Auth::check())
    <a href="/register">¡Registrate para empezar a jugar!</a>
    @endif
    <button type="submit" class="btn" id="buttonWelcome">
        <a class="display-2 welcomeJuegos"  href="/juegos">
          {{ __('  COMENZAR') }}
        </a>
      </button>
</div>
<div class="row justify-content-center">
    <div class="col-10 mt-2">
        <div class="alert alert-info welcomeTexto" role="alert">
            <h4 class="alert-heading"></h4>
            <strong>
                <p >Juego de preguntas y respuestas.- <br> <br>Para repasar los contenidos vistos en clase.-</p>
                @if(!Auth::check())
                <a href="/register">¡Registrate para empezar a jugar!</a>
                @endif
            </strong>

        </div>
    </div>
    <div class="col-2">
        <img src="{{url('/img/estudiante.png')}}" class="imagenEstudiante" alt="no image">
    </div>
</div>
@endsection
<!-- @section('footer')
<footer class="footerJuegos">
    <h4>Todos los derechos reservados - El juego de la Historia</h4>
</footer>
@endsection -->

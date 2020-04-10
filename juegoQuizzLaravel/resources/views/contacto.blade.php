@extends('layouts.app')

@section('title','El juego de la Historia - Contacto')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="col-8 contactoCard">
    <div class="col-2">
      <img src="{{url('/img/rocket.png')}}" class="imagenRocket" alt="no image">
    </div>

    <form action="/contacto" method="post">
      @csrf
      <h4>Escribinos tu Consulta</h4>
      <div class="form-group">
        <label for="asunto">Asunto</label>
        <input type="text" class="form-control" name="asunto" id="asunto" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <label for="consulta">Consulta</label>
        <textarea class="form-control" name="consulta" id="consulta" rows="3"></textarea>
      </div>
      <button class="btn " id="buttonCheck">Enviar Consulta</button>
    </form>
    @include('layouts.errors')

  </div>

</div>
<br>
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{session('message')}}</strong>
</div>

@endif
@endsection

@extends('layouts.app')

@section('title','Create Quiz')

@section('content')
<div class="mt-5">



  <br>
  <a class="infoJuegoCreado" href="/juegos/{{$juego->id}}"> ← Atras </a><br><br>
  {{-- @isset($message)
    <div class="alert alert-success" role="alert">
        <strong>
            {{$message}}
  </strong>
</div>
@endisset --}}

<form action="/juegos/{{$juego->id}}/quiz" method="post">
  @csrf

  <div class="form-group">
    <label for="pregunta">Pregunta</label>
    <input class="form-control" name="pregunta" id="pregunta" rows="3" value="{{old('pregunta')}}">
    @error('pregunta')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="respuesta1"> Respuesta A</label>
    <input class="form-control" name="respuesta1" id="respuesta1" rows="3" value="{{old('respuesta1')}}">
    @error('respuesta1')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="respuesta2">Respuesta B</label>
    <input class="form-control" name="respuesta2" id="respuesta2" rows="3" value="{{old('respuesta2')}}">
    @error('respuesta2')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="respuesta3">Respuesta C</label>
    <input class="form-control" name="respuesta3" id="respuesta3" rows="3" value="{{old('respuesta3')}}">
    @error('respuesta3')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  Check a las Respuestas Correctas:
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="checkA" id="checkA" value="1">
      A
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="checkB" id="checkB" value="1">
      B
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="checkC" id="checkC" value="1">
      C
    </label>
  </div>
  <button type="submit" class="btn btn-success">Crear Quiz</button>
</form>
<br>
@if (session('create'))
<div class="alert alert-success" role="alert">
  <strong>{{session('create')}}</strong>
</div>
@endif
{{-- @include('/layouts.errors') --}}
</div>
<script>
  window.onload = function() {
    var checkA = document.getElementById('checkA');
    var checkB = document.getElementById('checkB');
    var checkC = document.getElementById('checkC');

    var checkBoxs = document.querySelectorAll('input[type="checkbox"]');

    checkBoxs.forEach(function(element) {
      element.onclick = function() {
        if (element.getAttribute("name") == 'checkA') {
          checkB.checked = false;
          checkC.checked = false;
        } else {
          if (element.getAttribute("name") == 'checkB') {
            checkA.checked = false;
            checkC.checked = false;
          } else {
            if (element.getAttribute("name") == 'checkC') {
              checkA.checked = false;
              checkB.checked = false;
            }
          }
        }
      }

    });
  }
</script>
@endsection

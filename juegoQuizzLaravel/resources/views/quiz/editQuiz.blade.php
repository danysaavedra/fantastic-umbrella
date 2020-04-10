@extends('layouts.app')

@section('title','Edit Quiz')

@section('content')


<form action="/juegos/{{$juego->id}}/quiz/{{$pregunta->id}}" method="post" class="editQuiz"><br>
  <br>
  <a class="infoJuegoCreado" href="/juegos/{{$juego->id}}"> ← Atras </a><br><br>
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="pregunta">Pregunta</label>
        <textarea class="form-control" name="pregunta" id="pregunta" rows="3">{{$pregunta->detalle}}</textarea>
    </div>
    <?php
    $count = 0;
    ?>
    @foreach ($pregunta->respuestas as $respuesta)

    <div class="form-group">
        <label for="respuesta{{$respuesta->id}}"> Respuesta</label>
        <textarea class="form-control" name="respuesta{{$respuesta->id}}" id="respuesta{{$respuesta->id}}" rows="3">{{$respuesta->cuerpo}}</textarea>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="check{{$respuesta->id}}" id="check{{$count++}}" value="1" @if ($respuesta->correcta==1)
                {{'checked'}}
                @endif>
                valor definido: <strong style="color:red;">{{$respuesta->correcta}}</strong> @if ($respuesta->correcta==1) (check para cambiarla a "incorrecta") @endif
                @if ($respuesta->correcta==0)(check para cambiarla a "correcta")@endif
            </label>
        </div>
    </div>

    @endforeach

    <button type="submit" class="btn btn-success">Guardar cambios</button>

</form>
<form action="/juegos/{{$juego->id}}/quiz/{{$pregunta->id}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar Quiz</button>
</form>
@include('/layouts.errors')
@endsection
<script>
    window.onload = function() {
        var checkBoxs = document.querySelectorAll('input[type="checkbox"]');

        var checkA = checkBoxs[0];
        var checkB = checkBoxs[1];
        var checkC = checkBoxs[2];

        checkBoxs.forEach(function(element) {
            element.onclick = function() {
                if (element.getAttribute("id") == 'check0') {
                    checkB.checked = false;
                    checkC.checked = false;
                } else {
                    if (element.getAttribute("id") == 'check1') {
                        checkA.checked = false;
                        checkC.checked = false;
                    } else {
                        if (element.getAttribute("id") == 'check2') {
                            checkA.checked = false;
                            checkB.checked = false;
                        }
                    }
                }
            }

        });
    }
</script>

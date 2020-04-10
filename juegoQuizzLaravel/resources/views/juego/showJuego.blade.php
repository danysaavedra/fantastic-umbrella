@extends('layouts.app')

@section('title','El juego de la Historia - Juego')

@section('content')
<a href="/juegos">Volver a vista de Juegos creados</a>
<div class="row justify-content-center mt-5 ">
    <div class="col-12 col-xs-6">
        <div style="border: solid black 4px;" class="border-success text-center profJuego pb-3">

            <div class="">
                <img  style="width:200px; height:180px;" class="img-fluid profImg mt-4" src="/storage/images/{{$juego->image_profile}}" alt="No image">
            </div>
            <div class="card-body juegoCardBody">
                <br>
                <p style="color:red;">Nombre de Juego:</p> <strong>
                    <h4 class="card-title">{{$juego->nombre}}</h4>
                </strong>

                <p style="color:red;">Descripcion de Juego:</p> <strong>
                    <h5 class="card-text">{{$juego->descripcion}}</h5>
                </strong>
                <div class="mt-3">
                    <strong><a class="infoJuegoCreado" href="/juegos/{{$juego->id}}/edit">Editar Juego</a></strong>

                </div>
            </div>
            <!-- <form action="/logros/delete" class="mt-5"  id="deleteLogros" method="POST" >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Reset Tabla Logros</button>
                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    <strong>{{session('message')}}</strong>
                </div>

                @endif
            </form> -->
    </div>
    <br>
    <a class="infoJuegoCreado" href="/juegos">Volver al inicio</a><br><br>
    <a class="infoJuegoCreado" href="/juegos/{{$juego->id}}/quiz/create">Crear Quiz</a>
</div>
</div>
<!-- <br><br> -->
<!-- <p style="color:red;">Editar Quizzes del juego:</p> <strong> -->
@if ($juego->preguntas->count())
<div class="row justify-content-end">
    {{$quizzes->links()}}
</div>
<div class="row justify-content-center ">

    @foreach ($quizzes as $quiz)
    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
        <div class="card-deck">


            <div class="card border-warning quizCard mt-3 profQuiz">
                <div class="card-header">
                    <h4>{{$quiz->detalle}}</h4>
                </div>
                <div class="card-body profQuizSon">
                    @foreach ($quiz->respuestas as $respuesta)
                    <p class="card-text">{{$respuesta->cuerpo}} / <strong>Value: {{$respuesta->correcta}}</p></strong>
                    @endforeach
                </div>
                <a class="mb-2 btn-editarPregunta" href="/juegos/{{$juego->id}}/quiz/{{$quiz->id}}/edit">Editar pregunta</a>
            </div>

        </div>
    </div>
    @endforeach

    {{-- @foreach ($juego->preguntas as $pregunta)
                    <div class="col-4">
                            <div class="card border-warning quizCard mt-3">
                                <div class="card-header">
                                       <h4>{{$pregunta->detalle}}</h4>
</div>
<div class="card-body">
    @foreach ($pregunta->respuestas as $respuesta)
    <p class="card-text">{{$respuesta->cuerpo}} / <strong>Value: {{$respuesta->correcta}}</p></strong>
    @endforeach
</div>
<div class="card-footer">
    <a href="/juegos/{{$juego->id}}/quiz/{{$pregunta->id}}/edit">Editar pregunta</a>

</div>
</div>

</div>
@endforeach --}}
</div>



@endif
@endsection
<!-- <script>
    window.onload=function(){
        var form=document.getElementById("deleteLogros");

        form.onsubmit=function(event){
                event.preventDefault();
                var confirmed=confirm('Esta seguro que desea Eliminar la tabla de Logros?');
                if(confirmed){
                                var action=this.action;
                            var token=document.querySelector('input[name="_token"]').value;

                            var opciones = {
                                    method: 'DELETE',

                                    headers: {
                                        "Content-Type": "application/json",
                                        "Accept": "application/json, text-plain, */*",
                                        "X-Requested-With": "XMLHttpRequest",
                                        "X-CSRF-TOKEN": token
                        }
                    };
                    fetch(action, opciones)
                                .then(function(response){
                                            return response.json();
                                })
                                .then(function(datos){
                                        alert(datos['mensaje']);
                                })
                                .catch(function(error){
                                        console.log(error);
                                })
                    };

                }

    }

</script> -->

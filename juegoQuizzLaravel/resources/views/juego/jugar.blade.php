@extends('layouts.app')

@section('title','El juego de la historia - Juego')

@section('content')

@if (isset($pregunta))

<form action="/jugar/{{$juego->id}}/pregunta/{{$pregunta->id}}" method="post">
@csrf


<!-- {{-- <img src="{{url('/img/tipoTiempo.png')}}" class="imagenTipoInformacion" alt="no image"> --}} -->
<div class="alert alert-info alertInformacionTipo" role="alert">
    <p> □ Son siete preguntas en total.- </p><br>
    <p> □ Cada respuesta correcta suma un punto.-</p> <br>
    <p> □ Solo hay una respuesta correcta por pregunta.-</p> <br><br>
    <p> □ □ ¡ A practicar ! □ □</p><br>

</div>


    <div class="row justify-content-center">

        <div class="col-12 col-lg-6">
            <p class="juegoNombre">{{$juego->nombre}}</p>

            <div class="card juegoCardIn">
                <img src="{{url('/img/tipoFlecha.png')}}" class="imagenTipoFlecha" alt="no image" hidden>

                <img src="{{url('/img/hombrePregunta.png')}}" class="imagenHombrePregunta" alt="no image" hidden>

                <div class="card-header text-center">
                    <p>Pregunta Nº1</p>
                    <p class="col-12 col-xs-12 col-sm-12 col-md-12 card-title detallePregunta">{{$pregunta->detalle}}</p>
                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 card-body nivelCardBody">
                    @foreach ($pregunta->respuestas as $respuesta)

                    <div class="form-check detalleRespuesta">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="checkA" id="checkA" value="{{$respuesta->correcta}}">
                            <p class="card-text">{{$respuesta->cuerpo}}</p><br>
                        </label>
                    </div>

                    @endforeach
                </div>
                <div class="card-footer">
                    <input type="number" value="1" name="count" hidden>
                    <button type="submit" class="btn" id="buttonCheck">ENVIAR</button>

                </div>
            </div>



            <div class="alert alert-success" role="alert" id="alertCorrecta" hidden>
                <strong>Correcta!</strong>
            </div>
            <div class="alert alert-danger" role="alert" id="alertIncorrecta" hidden>
                <strong>Incorrecta!</strong>
            </div>
            @include('layouts.errors')

        </div>

    </div>
</form>


@else
Todavia No hay preguntas formuladas para esta seccion
@endif
<script src="{{ URL::asset('js/jugar.js') }}"></script>
@endsection
{{-- credit de la imagen --}}
{{-- <a href="https://www.freepik.com/free-photos-vectors/business">Business vector created by macrovector_official - www.freepik.com</a> --}}

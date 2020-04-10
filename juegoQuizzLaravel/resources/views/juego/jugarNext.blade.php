@extends('layouts.app')
@section('title','El juego de la Historia - Juego')

@section('content')
<form action="/jugar/{{$juego->id}}/pregunta/{{$next->id}}" method="post">
@csrf


<div class="row justify-content-center">
    <div class="col-12 col-xs-12 col-sm-12 col-md-6">
        <p class="juegoNombre">{{$juego->nombre}}</p>
        @isset($next)

        <div class="card juegoCardIn">
            <img src="{{url('/img/tipoFlecha.png')}}" class="imagenTipoFlecha" alt="no image" hidden>

                <div class="card-header text-center">
                    <h4>Pregunta Nº @isset($count)
                        {{$count}} :
                        @endisset </h4>
                        <h4 class="col-12 col-xs-12 col-sm-12 col-md-12 card-title detallePregunta"> {{$next->detalle}}</h4>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 card-body nivelCardBody">
                        @foreach ($next->respuestas as $respuesta)

                        <div class="form-check detalleRespuesta">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="checkA" id="checkA" value="{{$respuesta->correcta}}">
                            <p class="card-text">{{$respuesta->cuerpo}}</p><br>
                        </label>
                    </div>

                    @endforeach

                </div>
                <div class="card-footer">
                    <input type="number" @isset($count) value="{{$count++}}" @endisset name="count" hidden>

                    <button type="submit" class="btn" id="buttonCheck">ENVIAR</button>
                </div>
            </div>
            @endisset



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



<script src="{{ URL::asset('js/jugar.js') }}"></script>
@endsection

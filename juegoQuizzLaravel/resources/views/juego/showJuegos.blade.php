@extends('layouts.app')

@section('title','El juego de la Historia - Juego')

@section('content')

@if (session('create'))
<div class="alert alert-success" role="alert">
    <strong>{{session('create')}}</strong>
</div>
@endif
{{-- <img src="{{url('/img/hombrePregunta.png')}}" class="imagenHombrePregunta"> --}}
<!-- {{-- <img src="{{url('/img/tipoIdea.png')}}" class="imagenTipoIdea" alt="no image"> --}}  -->
<div class="row justify-content-between">
    @if (Auth::check())
    <h1 class="bienvenido col-10">¡Bienvenido/a {{Auth::user()->name}}!</h1>
    @endif

    @if (!$juegos->count()==0)


    <div class="col-lg-2 col-12">{{$juegos->links()}}</div>
</div>


<div class="row justify-content-center ">

    @foreach ($juegos as $juego)
    <?php $maxPreg = count($juego->preguntas) ?>
    @if($maxPreg != 0)
    <div class="cajaJuego col-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card text-center juegoCard mt-5">
            <div class="card-header juegoHeader">
              {{$juego->nombre}}
            </div>
            <div class=""><img style="width:200px; height:180px;" class="image_juegos img-fluid col-12" src="/storage/images/{{$juego->image_profile}}" alt="{{$juego->image_profile}}">
            </div>

            <div class="card-body juegoCardBody">
                <div style="display:inline-block;">
                    <a href="/jugar/{{$juego->id}}" data-toggle="tooltip" data-placement="top" title="{{$juego->descripcion}}" class="red-tooltip">
                        <h4 class="linkJugar">COMENZAR</h4> <br>
                    </a>
                </div>
                <?php $puntos = [] ?>
                {{-- Puntaje de partidas= --}}
                @foreach ($logros as $logro)
                @if ($logro->juego_id==$juego->id)
                <?php $puntos[] = $logro->puntaje ?>
                @endif
                @endforeach
                <p class="puntaje"><strong>
                        Puntos:
                        @if ($puntos)
                        {{array_sum($puntos)}}
                        @else
                        0
                        @endif
                    </strong>/{{$maxPreg}}
                </p>
                <p>
                    @if (Auth::check() && Auth::user()->admin==1)
                    <a href="/juegos/{{$juego->id}}" class="infoJuegoCreado"> EDITAR JUEGO </a>
                    @endif
                </p>

            </div>



        </div>
    </div>
    @elseif($maxPreg == 0 && Auth::check() && Auth::user()->admin==1)
    <div class="cajaJuego col-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card text-center juegoCard mt-5">
            <div class="card-header juegoHeader">
                <h5>{{$juego->nombre}}</h4>
            </div>
            <div class=""><img class="image_juegos img-fluid col-12" src="/storage/images/{{$juego->image_profile}}" alt="{{$juego->image_profile}}">
            </div>
            <div class="card-body juegoCardBody">
                <div style="display:inline-block;">
                    <p style="font-size:28px">Este juego no contiene preguntas</p>
                </div>
                <?php $puntos = [] ?>
                {{-- Puntaje de partidas= --}}
                @foreach ($logros as $logro)
                @if ($logro->juego_id==$juego->id)
                <?php $puntos[] = $logro->puntaje ?>
                @endif
                @endforeach
                <p class="puntaje"><strong>
                        Puntaje:
                        @if ($puntos)
                        {{array_sum($puntos)}}
                        @else
                        0
                        @endif
                    </strong>/{{$maxPreg}}
                </p>
                <p>
                    @if (Auth::check() && Auth::user()->admin==1)
                    <a href="/juegos/{{$juego->id}}" class="infoJuegoCreado"> EDITAR JUEGO </a>
                    @endif
                </p>

            </div>



        </div>
    </div>
    @endif
    @endforeach

</div>
@else
<div class="row justify-content-center text-center mt-5">
    <div class="col-12">
        <div class="alert alert-warning mt-5" role="alert">
            <strong>No se encuentran coincidencias</strong>
        </div>
    </div>

</div>

@endif
@endsection

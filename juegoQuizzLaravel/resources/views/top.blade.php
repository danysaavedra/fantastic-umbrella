@extends('layouts.app')

@section('title','El juego de la Historia - TOP')

@section('content')
<div class="row justify-content-center mt-5">

    <div class="col-12 top-body">
        <div class="col-2 topCard">
            <img src="{{url('/img/copa.png')}}" class="imagenCopa" alt="no image">
        </div>
        <h2 class="mb-4 tituloTop">Puntajes acumulados</h2>

        @if (auth()->check() && auth()->id() && Auth::user()->admin==1)

        <form action="/logros/delete" class="my-3" id="deleteLogros" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Borrar progreso</button>
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('message')}}</strong>
            </div>

            @endif
        </form>
        @endif
        <ul class="list-group-flush" style="padding-left:0px;">
            <li class="list-group-item d-flex justify-content-between align-items-center active">
                <strong> Puesto </strong><strong> Usuario </strong><strong> Puntos </strong>
            </li>
            <?php $count = 0; ?>
            @foreach ($new as $item)
            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <?php $count++ ?>
                <!-- Puesto Nº -->
                {{$count}}

                @foreach ($item as $value =>$valor)
                @if ($value=='Puntos')

                <h5>
                    @if ($count==1)
                    <i class="fas fa-medal"></i>
                    @endif
                    <span class="badge badge-danger">{{$valor}}</span></h5>

                @else
                <strong> {{$valor}}</strong>
                @endif

                @endforeach
            </a>



            @endforeach



        </ul>
    </div>
</div>
<script>
    window.onload = function() {
        var form = document.getElementById("deleteLogros");

        form.onsubmit = function(event) {
            event.preventDefault();
            var confirmed = confirm('Está seguro que desea borrar el progreso actual?');
            if (confirmed) {
                var action = this.action;
                var token = document.querySelector('input[name="_token"]').value;

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
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(datos) {
                        alert(datos['mensaje']);
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            };

        }

    }
</script>
@endsection

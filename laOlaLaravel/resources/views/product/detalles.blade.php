@extends('layouts.plantilla')

@section('contenido')

<div class="container">
  <section id="detalle-producto">

    <div class="row" id="div-papi">
      <div class="col-12">
        <ul>
          <li><a href="/productos">Productos</a></li> /
          <li><a href="#"><strong>{{$caca->name}}</strong></a></li>
        </ul>
      </div>
    </div>


    <div id="div-producto{{$caca->name}}">
      <div class="row">

        <div class="col-sm-6" id="div-producto{{$caca->name}}">
          @if (session('mensaje'))
            <div class="alert alert-success">
              {{ session('mensaje') }}
            </div>
          @endif
           <!-- <img src="/storage/{{$caca->avatar}}" class="" alt="Combo 4 Hamburguesas Veggie de {{$caca->name}}"> -->
           <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/storage/{{$caca->avatar}}" class="d-block w-100" alt="{{$caca->name}}">
              </div>
              <div class="carousel-item">
                <img src="/storage/{{$caca->avatar1}}" class="d-block w-100" alt="{{$caca->name}}">
              </div>
              <div class="carousel-item">
                <img src="/storage/{{$caca->avatar2}}" class="d-block w-100" alt="{{$caca->name}}">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
</div>
        </div>

        <div class="col-sm-6 tarjeta">

              <h1>{{$caca->name}}</h1>
              <p><span>Ingredientes:</span>  {{$caca->description}}</p>
              <br>
              <p class="precio">Precio: $ {{$caca->price}}</p>
              <br>
              <form action="/productos/agregarCarrito" method="post">
              @csrf
                <!-- <input type="number" name="cantidad" min =1 value=""> -->
                <button type="submit" class=""  name="product_id" value="{{$caca->id}}">Agregar al carrito</button>
                  <br><br><br>
                @if((Auth::user())&& (Auth::user()->admin))
                  <a href="/productos/editar/{{$caca->id}}">Editar producto</a>
                  <a href="#" data-toggle="modal" data-target="#producto{{$caca->id}}">Borrar producto</a>
                @endif
              </form>
              <img src="/storage/ola-verde.png" alt="te lleva la ola" style="width: 100px; margin-top: 30px;">
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="producto{{$caca->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <form class="modal-eliminar" id="form-{{$caca->id}}" action="/productos/delete/{{$caca->id}}" method="post">
                @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Seguro querés eliminar este producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="color: black;">
                {{$caca->name}}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
                <input type="hidden" name="id" value="{{$caca->id}}">
                <input type="submit" class="btn btn-danger" name="" value="Borrar Producto">
              </div>
            </form>

            </div>
          </div>
        </div>
        <!-- end modal -->
      </div>
    </div>
  </section>
</div>

<script type="text/javascript" src="js/librerias.js"></script>
<script src="js/products.js"></script>

@endsection

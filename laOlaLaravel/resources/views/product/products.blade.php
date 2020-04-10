@extends('layouts.plantilla')

@section('contenido')

<div class="container">

<!-- BUSCADOR -->
    <form style="padding: 0 15px;" class="" action="/productos" method="get">
      <div class="input-group mt-3">
        <input type="text" name="name" class="form-control" placeholder="Buscá acá tus hamburguesas" aria-label="Buscá acá tus hamburguesas" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="input-group-text" id="basic-addon2" type="submit"><i class="fas fa-search"></i></button>
            </div>
      </div>
    </form>

    <h1 class="titulo-productos">// NUESTRAS <strong>HAMBURGUESAS</strong></h1>


    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif


      <div class="row" id="div-papi">
        @foreach($products as $product)
          <div class="col-sm-4" id="div-producto{{$product->id}}">
            <div class="card mb-3">

                <div class="card-producto">
                  <div class="producto-hover">
                      <div class="producto-hover-content">
                          <form action="/productos/agregarCarrito" method="post">
                          @csrf
                            <button type="submit" class=""  name="product_id" value="{{$product->id}}"><i class="fas fa-cart-plus"></i></button>
                            <a href="/productos/detalles/{{$product->id}}"><i class="fas fa-search-plus"></i></a>
                          </form>
                      </div>
                  </div>
                  <img src="/storage/{{$product->avatar}}" alt="Hamburguesas Veganas">
                </div>

                <div class="titulo">
                    <a href="#"><h5>{{$product->name}}</h5></a>
                    <p><em>Precio: $ {{$product->price}} </em></p>
                </div>


                </div>


              </div>


            <!-- Modal -->
            <div class="modal fade" id="producto{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <form class="modal-eliminar" id="form-{{$product->id}}" action="/productos/delete/{{$product->id}}" method="post">
                  @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Seguro querés eliminar este producto?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: black;">
                      {{$product->name}}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>

                      <input type="hidden" name="id" value="{{$product->id}}">
                      <input type="submit" class="btn btn-danger" name="" value="Borrar Producto">
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- end modal -->
        @endforeach
      </div>
    {{$products->links()}}

</div>

<script type="text/javascript" src="js/librerias.js"></script>
<script src="js/products.js"></script>

@endsection

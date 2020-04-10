@extends('layouts.plantilla')

@section('contenido')
<div class="container" style="margin-top: 50px;">
  <div class="carrito">
    <a href="/productos">Seguir Comprando</a>

    <?php
          $suma = 0;
          ?>
    @foreach($detalles as $detalle)

    <form class="" action="/carrito/sacarCarrito" method="post">
    @csrf



<br>
            <div class="card-group">
              <div class="card">
                  <div class="card-body" id="avatar-carrito" style="max">
                  <img src="storage/{{$detalle->avatar}}" alt="">
                </div>
              </div>
              <div class="card" id="prodcuto-nombre" >
                <div class="card-body">
                  <h1>{{$detalle->name}}</h1>
              </div>
              </div>
              <div class="card" id="producto-precio">
                <div class="card-body">
                  <p class="card-text"><small class="text-muted">Pack por 4 U: ${{$detalle->price}}</small></p>
                </div>
              </div>

              <div class="card" id="producto-precio">
                <div class="card-body">
                  <p class="card-text"><small class="text-muted"> Cantidad: {{$detalle->pivot->quantity}}</small></p>
                  <p class="card-text"><small class="text-muted">Subtotal: {{$detalle->pivot->quantity * $detalle->price}}</small></p>
                </div>
              </div>

              <div class="card" id="boton-sacarCarrito">
                <button type="submit" name="detalle_id" value="{{$detalle->id}}">sacar del carrito</button>
              </div>
            </div>


    </form>

<?php  $subtotal[]= $detalle->price * $detalle->pivot->quantity;

 $suma = array_sum($subtotal);

?>

@endforeach




  <div class="total-carrito"class="card-body text-dark" class="h-50 d-inline-block" class="width:80%;">
    <ul class="list-group list-group-horizontal">

      <li class="list-group-item"><h5 style='color:black'  class="card-title">Total:</h5></li>
      <li class="list-group-item" ><strong>${{$suma}}</strong></li>
    </ul>
  </div>
  

  <button style="margin-bottom: 20px;" type="submit" name="" value="">Finalizar compra</button>

  </div>
</div>
   @endsection

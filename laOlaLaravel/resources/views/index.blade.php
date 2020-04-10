@extends('layouts.plantilla')

@section('contenido')


<div class="fondo-banner">
    <div class="texto-banner">

        <h1>HAMBURGUESAS</h1>
        <h2>VEGGIES</h2>
        <p>100% Artesanales & Sin Conservantes</p>
    </div>
    <a href="#sobreNosotros">Conocé más de nosotros</a>
    <a href="/productos">Hacé tu pedido</a>
  </div>

  <section id="productosDestacados">
    <div class="titulo-productos">
      <h3>Productos Destacados</h3>
      <hr>
    </div>
        <div class="container-productos">
          @foreach($products as $product)
            <article class="producto">
                <div class="producto-hover">
                    <div class="producto-hover-content">
                        <i class="fas fa-heart"></i>  
                        <a href='/productos?name={{$product->name}}'><h5>{{$product->name}}</h5></a>
                    </div>
                </div>
                <img src="/storage/{{$product->avatar}}"alt="Combo 1 Hamburguesas Veggie">
            </article>
          @endforeach
        </div>
  </section>

  <section id="sobreNosotros">
    <h3>- TE LLEVA LA OLA -</h3>
    <p>Creemos que aportar valor es fundamental para nuestro crecimiento. Queremos acompañarte en mejorar tu alimentación y así puedas sentir vitalidad y energía en cada día. Realizamos nuestra labor con dedicación y amor, donde cuidar cada detalle es importante. <br>
    Por ello ofrecemos un producto artesanal, donde los sabores se conservan tal cual a la materia prima, <strong> 100% natural, sin agregados artificiales ni químicos.</strong>
    La Ola te propone preparar tus comidas de una manera simple y sana.
  <img src="img/icono-logo.png" alt=""></p>

  </section>


@endsection

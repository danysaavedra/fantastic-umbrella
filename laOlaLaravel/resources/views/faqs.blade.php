@extends('layouts.plantilla')

@section('contenido')
<div class="fondo-preguntas">

    <div class="container">
        <div class="preguntasF" id="accordionExample">
            <h3>Preguntas Frecuentes</h3>

      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              ¿Contiene ingredientes de origen animal?
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <p>En solo 2 (dos) sabores de los 7 que producimos. <br> Incluimos queso en la preparacion, obteniendo asi, nuestras 2 (dos) únicas opciones vegetarianas. <br>Los 5 (cinco) sabores restantes son 100% veganos. </p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              ¿Se pueden congelar?
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <p class="respuesta">Si, en efecto las entregamos congeladas.<br>
            Una vez descongeladas, ya NO se pueden volver a congelar. </p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              ¿Cuanto duran en el freezer?
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <div class="card-body">
            <p class="respuesta">Se pueden conservar en el frezzer hasta 6 meses.</p>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingFour">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
              ¿Son aptas para Celíacos? (Sin T.A.A.C)
            </button>
          </h2>
        </div>

        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
          <div class="card-body">
            <p class="respuesta">Por el momento, lamentamos no poder evolucionar en nuestra receta a niveles mas inclusivos.<br>De todos modos, es uno de nuestros objetivos a corto plazo.</p>
          </div>
        </div>
      </div>

        <div class="card">
        <div class="card-header" id="headingFive">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
              ¿Como se preparan al momento de comerlas?
            </button>
          </h2>
        </div>

        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
          <div class="card-body">
            <p class="respuesta">De una manera muy práctica.<br>
            Precalentamos una superficie lisa (Horno o Sartén) con unas gotitas de aceite y colocamos LA OLA directamente salidas del freezer. A fuego medio, cocinamos aproximadamente 5 minutos de cada lado, dando vuelta el producto cuando usted crea necesario. ¡Y lista para disfrutar! <br> Usted puede elegir si, entre panes, al plato o hasta como guarnición.<br>Nosotros te aseguramos un producto 100% natural y de exquisito sabor. </p>
          </div>
        </div>
      </div>

        <div class="card">
        <div class="card-header" id="headingSix">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
              ¿Como las fabrican?
            </button>
          </h2>
        </div>

        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
          <div class="card-body">
            <p class="respuesta">Con conciencia, amor y dedicación. Utilizando verduras y legumbres frescas de primera calidad.<br> Nuestra producción es artesanal en su totalidad y el estar libre de conservantes en cada uno de sus procesos, obtenemos un producto naturalmente exquisito, manteniendo cada ingrediente con su sabor natural y casero. </p>
          </div>
        </div>
      </div>

        <div class="card">
        <div class="card-header" id="headingSeven">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
              ¿Hacen envios a domicilio?
            </button>
          </h2>
        </div>

        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
          <div class="card-body">
            <p class="respuesta">Hacemos envios a domicilio sin cargo por la zona de Ramos Mejia, San Justo, Isidro Casanova. <br> Las demas zonas consultar por inbox. </p>
          </div>
        </div>
      </div>

        <div class="card">
        <div class="card-header" id="headingEight">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
              ¿Tienen local a la calle? ¿atencion al público?
            </button>
          </h2>
        </div>

        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
          <div class="card-body">
            <p class="respuesta">Por el momento solo hacemos envios a domicilio.</p>
          </div>
        </div>
      </div>

      </div>
    </div>

</div>
@endsection
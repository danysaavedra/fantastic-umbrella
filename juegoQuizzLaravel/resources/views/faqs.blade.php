@extends('layouts.app')

@section('title','El juego de la Historia - FAQs')

@section('content')
<div class="row justify-content-center faqsCard">


    <h1 class="col-10 col-sm-10">PREGUNTAS FRECUENTES</h1>


    <div class="col-10 col-sm-10 mb-5 ">
        <div id="accordion">
            <div class="card faqsText">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link botoncito" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ¿Qué es el "Momento de práctica"?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body ">
                       Es el bloque de práctica que acompaña a las clases teóricas para ayudar a fijar los conocimientos explicados en cada clase.
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header" id="headingEight">
                        <h5 class="mb-0">
                            <button class="btn btn-link botoncito collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                ¿Quién puede jugar?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                        <div class="card-body">
                              Los alumnos que estén cursando la materia.
                        </div>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0">
                            <button class="btn btn-link botoncito collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                ¿Cómo empiezo a jugar?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                        <div class="card-body">
                            Para empezar a jugar es necesario estar logueado en la página. Para eso en
                            primer lugar hay que crear un usuario y contraseña.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link botoncito collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Cuales son las reglas del juego?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Es un juego de preguntas y respuestas dividido en niveles. Cada nivel
                            corresponde a una clase y tiene siete preguntas con tres opciones de respuesta. Cada
                            nivel tendrá un puntaje basado en la cantidad de respuesatas correctas obtenidas. En base a
                            esos resultados podremos saber si estamos entendiendo las clases y qué contenidos nos
                            faltan repasar.
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link botoncito collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Los resultados del juego influyen en la nota final de la materia?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            No, el juego sirve para fijar los contenidos de la materia. Cada
                            nivel tendrá un puntaje basado en la cantidad de respuesatas correctas. En base a
                            esos resultados podremos saber si estamos entendiendo y qué contenidos nos
                            faltan repasar.
                        </div>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header" id="headingNine">
                        <h5 class="mb-0">
                            <button class="btn btn-link botoncito collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                ¿Puedo jugar en cualquier momento?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                        <div class="card-body">
                            Si, se puede acceder en cualquier
                            momento, repasar las preguntas y volver a contestarlas cualquier cantidad de veces (el sistema guardará el mayor puntaje obtenido)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

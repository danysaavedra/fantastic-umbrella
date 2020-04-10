<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\Pregunta;
use App\Juego;
use Carbon\Carbon;

class quizController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        abort_if(auth()->guest() || auth()->user()->admin == 0, 403);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        abort_if(auth()->guest() || auth()->user()->admin == 0, 403);


        $juego = Juego::find($id);
        return view('quiz.createQuiz', compact('juego'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Juego $juego)
    {

        $request->validate(
            [
                'pregunta' => ['required'],
                'respuesta1' => ['required'],
                'respuesta2' => ['required'],
                'respuesta3' => ['required'],
                'checkA' => ['boolean'],
                'checkB' => ['boolean'],
                'checkC' => ['boolean']

            ],
            [

                'required' => 'Campo obligatorio',
            ]
        );


        $juego->addPregunta($request);

        return back()->with('create', 'Quiz Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($juegoId, $preguntaId)
    {
        abort_if(auth()->guest() || auth()->user()->admin == 0, 403);
        $juego = Juego::find($juegoId);
        $pregunta = Pregunta::find($preguntaId);
        return view('quiz.editQuiz', compact('juego', 'pregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($juegoId, $preguntaId, Request $request, Respuesta $respuesta)
    {
        $pregunta = Pregunta::find($preguntaId);

        $respuestaIdentificador = [];
        foreach ($pregunta->respuestas as $respuesta) {
            $respuestaIdentificador[] = $respuesta->id;
        }

        $request->has('check' . $respuestaIdentificador[0]) ? $isCheckedA = 1 : $isCheckedA = 0;
        $request->has('check' . $respuestaIdentificador[1]) ? $isCheckedB = 1 : $isCheckedB = 0;
        $request->has('check' . $respuestaIdentificador[2]) ? $isCheckedC = 1 : $isCheckedC = 0;

        $request->validate(
            [
                'pregunta' => ['required'],
                'respuesta' . $respuestaIdentificador[0] => ['required'],
                'respuesta' . $respuestaIdentificador[1] => ['required'],
                'respuesta' . $respuestaIdentificador[2] => ['required'],
                'check' . $respuestaIdentificador[0] => ['boolean'],
                'check' . $respuestaIdentificador[1] => ['boolean'],
                'check' . $respuestaIdentificador[2] => ['boolean']
            ],
            [
                'required' => 'Todos los campos son obligatorios',
            ]
        );

        $pregunta->updatePregunta($request, $pregunta);
        $respuesta->updateRespuesta($isCheckedA, $isCheckedB, $isCheckedC, $respuestaIdentificador);

        return redirect("/juegos/$juegoId");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($juegoId, $preguntaId)
    {
        $pregunta = Pregunta::find($preguntaId);
        $pregunta->delete();
        return redirect("/juegos/$juegoId");
    }
}

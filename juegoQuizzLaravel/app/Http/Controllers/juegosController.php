<?php

namespace App\Http\Controllers;

use App\Juego;
use App\User;
use App\Pregunta;
use App\Logro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class juegosController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->only(['jugar', 'nextPregunta', 'getPregunta']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = auth()->id();
        $juegos = Juego::paginate(1);
        $logros = Logro::where('user_id', $userId)->orderBy('puntaje', 'desc')->get();

        if (isset($request->buscador)) {
            $juegos = Juego::where('nombre', 'LIKE', '%' . $request->buscador . '%')->paginate(4);
            $juegos->appends(Input::except('page'));
        }

        return view('juego.showJuegos', compact('juegos', 'logros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        abort_if(auth()->guest() || auth()->user()->admin == 0, 403);

        return view('juego.createJuego');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Juego $juego)
    {

        $juego->createJuego($request);

        return redirect('/juegos')->with('create', 'Juego Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function show(Juego $juego)
    {
        abort_if(auth()->guest() || auth()->user()->admin == 0, 403);
        $quizzes = Pregunta::where('juego_id', $juego->id)->paginate(4);
        return view('juego.showJuego', compact('juego', 'quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function edit(Juego $juego)
    {
        abort_if(auth()->guest() || auth()->user()->admin == 0, 403);
        return view('juego.editJuego', compact('juego'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juego $juego)
    {

        $juego->updateJuego($request, $juego);

        return redirect('/juegos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juego $juego)
    {
        $juego->delete();
        return redirect('/juegos');
    }
    public function jugar($id)
    {
        $juego = Juego::find($id);
        $pregunta = $juego->preguntas->first();
        return view('juego.jugar', compact('juego', 'pregunta'));

    }

    public function nextPregunta($id, $nextId, Request $request)
    {
        $juego = Juego::find($id);

        $pregunta = Pregunta::find($nextId);

        $juego->analizarPuntos($juego, $pregunta, $request);

        $next = Pregunta::where('juego_id', $juego->id)->where('id', '>', $nextId)->orderBy('id')->first();
        sleep(1);
        $count = intVal($request->count);
        if ($next != null) {
            $count++;
            return view('juego.jugarNext', compact('juego', 'next', 'count'));
        }

        return redirect('/juegos');
    }
    public function getPregunta($id, $nextId)
    {
        $juego = Juego::find($id);
        $next = Pregunta::find($nextId);
        return view('juego.jugarNext', compact('juego', 'next'));
    }
}

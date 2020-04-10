<?php

namespace App\Http\Controllers;

use App\Logro;
use Illuminate\Http\Request;

class LogrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function show(Logro $logro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function edit(Logro $logro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logro $logro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Logro::truncate();

        return response()->json(['mensaje' => 'Progreso eliminado exitosamente!']);


        // return back()->with('message','borrado de logros');
    }
}

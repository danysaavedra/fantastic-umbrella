<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pregunta extends Model
{
    protected $guarded = [];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }

    public function addRespuesta($request, $pregunta)
    {

        $request->has('checkA') ? $isCheckedA = request('checkA') : $isCheckedA = 0;
        $request->has('checkB') ? $isCheckedB = request('checkB') : $isCheckedB = 0;
        $request->has('checkC') ? $isCheckedC = request('checkC') : $isCheckedC = 0;

        Respuesta::insert([

            [
                'cuerpo' => request('respuesta1'),
                'pregunta_id' => $pregunta->id,
                'correcta' => $isCheckedA,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'cuerpo' => request('respuesta2'),
                'pregunta_id' => $pregunta->id,
                'correcta' => $isCheckedB,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'cuerpo' => request('respuesta3'),
                'pregunta_id' => $pregunta->id,
                'correcta' => $isCheckedC,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ]);
    }
    public function updatePregunta($request, $pregunta)
    {
        $pregunta->update(['detalle' => $request->pregunta]);
    }
}

    // public function addPregunta($request,$pregunta)
    // {

    //         $pregunta->detalle=request('pregunta');
    //         $pregunta->save();
    // }

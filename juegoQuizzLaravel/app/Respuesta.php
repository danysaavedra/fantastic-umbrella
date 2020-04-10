<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Respuesta extends Model
{
    protected $guarded = [];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }

    public function updateRespuesta($isCheckedA, $isCheckedB, $isCheckedC, $respuestaIdentificador)
    {
        $ra = 'respuesta' . $respuestaIdentificador[0];
        $rb = 'respuesta' . $respuestaIdentificador[1];
        $rc = 'respuesta' . $respuestaIdentificador[2];

        DB::table('respuestas')->where('id', $respuestaIdentificador[0])->update(

            [
                'cuerpo' => request($ra),
                'correcta' => $isCheckedA
            ]
        );
        DB::table('respuestas')->where('id', $respuestaIdentificador[1])->update(

            [
                'cuerpo' => request($rb),
                'correcta' => $isCheckedB
            ]
        );
        DB::table('respuestas')->where('id', $respuestaIdentificador[2])->update(

            [
                'cuerpo' => request($rc),
                'correcta' => $isCheckedC
            ]
        );
        // no puedo hacer updates en una sola query ni con eloquent ni con where clauses
        // Respuesta::where('id',[$ra,$rb,$rc])->update(
        //     [
        //         [
        //             'cuerpo'=>request($ra),
        //             'correcta'=>$isCheckedA
        //         ],
        //         [
        //             'cuerpo'=>request($rb),
        //             'correcta'=>$isCheckedB
        //         ],
        //         [
        //             'cuerpo'=>request($rc),
        //             'correcta'=>$isCheckedC
        //         ]
        //     ]
        //         );

        // DB::table('respuestas')->whereIn('id',
        //     [
        //     $respuestaIdentificador[0],
        //     $respuestaIdentificador[1],
        //     $respuestaIdentificador[2]
        //     ]
        //     )->update(
        //         [
        //     [
        //         'cuerpo'=>request($ra),
        //         'correcta'=>$isCheckedA
        //     ],
        //     [
        //         'cuerpo'=>request($rb),
        //         'correcta'=>$isCheckedB
        //     ],
        //     [
        //         'cuerpo'=>request($rc),
        //         'correcta'=>$isCheckedC
        //     ]
        //         ]
        //     );
    }
}

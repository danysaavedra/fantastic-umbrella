<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Pregunta;
use App\User;
use Storage;

class Juego extends Model
{
    protected $guarded = [];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'logros')->withTimestamps()->withPivot('pregunta_id', 'puntaje');
    }

    public function logros()
    {
        return $this->hasMany(Logro::class);
    }

    public function createJuego($request)
    {

        $validated = $request->validate(
            [
                'nombre' => ['required', 'max:200'],
                'descripcion' => ['required', 'max:200'],
                'image_profile' => ['nullable', 'file', 'image']
            ],
            [
                'image' => 'Formato de imagen inválido',
                'required' => 'Campo obligatorio'
            ]

        );
        if ($request->hasFile('image_profile')) {
            $fileNameWithExt = $request->file('image_profile')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image_profile')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('image_profile')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.png';
        }
        Juego::create(
            [
                'nombre' => request('nombre'),
                'descripcion' => request('descripcion'),
                'image_profile' => $fileNameToStore
            ]
        );
    }
    public function updateJuego($request, $juego)
    {
        $validated = $request->validate(
            [
                'nombre' => ['required', 'max:200'],
                'descripcion' => ['required', 'max:200'],
                'image_profile' => ['nullable', 'file', 'image']
            ],
            [
                'required' => 'Campo obligatorio',
                'image' => 'Formato de imagen inválido'
            ]
        );
        if ($request->hasFile('image_profile')) {

            if ($juego->image_profile != 'noImage.png') {
                $path = 'public/images/' . $juego->image_profile;
                Storage::delete($path);
            }


            $path = $request->file('image_profile')->store('public/images');
            $nombreArchivo = basename($path);

            $juego->update(
                [
                    'nombre' => request('nombre'),
                    'descripcion' => request('descripcion'),
                    'image_profile' => $nombreArchivo
                ]
            );
        }
        $juego->update(
            [
                'nombre' => request('nombre'),
                'descripcion' => request('descripcion'),
            ]
        );













        
        //     if ($juego->image_profile != 'noImage.png') {
        //         $path = 'public/images/' . $juego->image_profile;
        //         Storage::delete($path);
        //     }


        //     $fileNameWithExt = $request->file('image_profile')->getClientOriginalName();

        //     $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //     $extension = $request->file('image_profile')->getClientOriginalExtension();

        //     $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        //     $path = $request->file('image_profile')->storeAs('public/images', $fileNameToStore);
        // } else {
        //     $fileNameToStore = 'noImage.png';
        // }

        // // buena forma de agregar userid en el validated y meterlo todo junto
        // // $userId=auth()->id();
        // // $validated +=array('user_id'=>$userId);
        // $juego->update(
        //     [
        //         'nombre' => request('nombre'),
        //         'descripcion' => request('descripcion'),
        //         'image_profile' => $fileNameToStore
        //     ]
        // );
    }
    public function addPregunta($request)
    {

        $preguntaObj = $this->preguntas()->create(
            [
                'detalle' => $request->pregunta
            ]
        );

        $pregunta = new Pregunta;
        $pregunta->addRespuesta($request, $preguntaObj);
    }
    public function analizarPuntos($juego, $preg, $request)
    {

        $pregId = $preg->id;
        $userId = auth()->id();

        $request->validate(
            [
                'checkA' => ['required', 'boolean']
            ],
            [
                'required' => 'Debes marcar al menos una opción'
            ]
        );
        $puntos = 0;

        if (intval($request->checkA) == 1) {
            $puntos = 1;
        }


        $logro = $juego->logros();
        $logro->updateOrCreate(
            [
                'juego_id' => $juego->id,
                'user_id' => auth()->id(),
                'pregunta_id' => $preg->id,
                'puntaje' => $puntos
            ]
        );



        // con esta forma de sync hace update sobre el mismo user y juego, pero no de pregunta y puntaje, no suma puntos
        // $juego->users()->syncWithoutDetaching([$userId=>['pregunta_id'=>$pregId,'puntaje'=>$puntos]]);

        //con este attach suma indiscriminadamente todas las veces que contestas una pregunta y el puntaje maximo se hace infinito
        // $juego->users()->attach(1,['user_id'=>$userId,'pregunta_id'=>$pregId,'puntaje'=>$puntos]);

        //forma de trabajar con hasmany y hasmany sin relaciones belongsToMany

        // Metodo para calcular puntos en forma de multiples opciones checkbox
        // $datos=[];
        // $datosRequest=[];
        // $CountClicksNegativos=0;

        // foreach ($juego->preguntas as $pregunta)
        // {
        //     foreach ($pregunta->respuestas as $respuesta)
        //     {
        //  $ident='check'.$respuesta->id;
        //         $valor=intval(($request->$ident));
        //         $datos+=array('check'.$respuesta->id=>$respuesta->correcta);

        //         $request->has('check'.$respuesta->id) && $request->$ident==1 ? $datosRequest+=array('check'.$respuesta->id=>$valor) : $CountClicksNegativos++ ;
        //     }
        // }

        // $arrayPuntos=count(array_intersect_assoc($datos,$datosRequest));

        // $logro=$juego->logros();
    }
}

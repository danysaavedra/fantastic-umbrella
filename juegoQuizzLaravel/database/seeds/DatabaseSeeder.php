<?php

use Illuminate\Database\Seeder;
use App\Juego;
use App\Pregunta;
use App\Respuesta;
use App\Logro;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 20)->create();

        factory(Logro::class, 200)->create();

        DB::table('users')->insert(

            [
                'name'     => 'Administrador',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('admin1234'),
                'admin'    => 1,
            ]

        );
    }
}



















        // factory(Juego::class, 8)->create()
        //     ->each(function ($juego) {
        //         $preguntas = $juego->preguntas();
        //         $preguntas->saveMany(factory(Pregunta::class, 7)->make());
        //     });

        // factory(User::class, 20)->create()
        //     ->each(function ($user) {
        //         $user->juegos()->attach(
        //             Juego::all()->random(8),
        //             ['puntaje' => rand(0, 1)]

        //         );
        //     });



        // $preguntas = Pregunta::all();

        // foreach ($preguntas as $pregunta) {
        //     $pregunta->respuestas()->saveMany(factory(Respuesta::class, 3)->make());
        // }


        // $users=User::all();
        //         foreach ($users as $user) {
        //             $x=$user->juegos()->each(function($logro){
        //                 $preguntas=Pregunta::all();
        //                 $users=User::all();
        //                 foreach ($users as $usuario) {
        //                     foreach ($preguntas as $pregunta) {
        //                            return $logro->attach(['user_id'=>$usuario->id,'pregunta_id'=>$pregunta->id,'puntaje'=>rand(0,1)]);

        //                     }
        //                 }

        //             });
        //         }

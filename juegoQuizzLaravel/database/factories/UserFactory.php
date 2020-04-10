<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Juego;
use App\Pregunta;
use App\Respuesta;
use App\Logro;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/



$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'     => $faker->name,
        'email'    => $faker->unique()->safeEmail,
        'password' => bcrypt('12345678'), // password
    ];
});


$factory->define(Logro::class,function(Faker $faker){
    return [
        'user_id'  => App\User::all()->random()->id,
        'juego_id' => Juego::all()->random()->id,
        'puntaje'  => $faker->numberBetween(0,1),
    ];
});

















// $user = $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'remember_token' => Str::random(10),
//     ];
// });

// $juego = $factory->define(Juego::class, function (Faker $faker) {
//     return [
//         'nombre' => $faker->name,
//         'descripcion' => $faker->word
//     ];
// });
// $factory->define(Pregunta::class, function (Faker $faker) use ($factory) {
//     return [
//         'detalle' => $faker->word
//         // 'juego_id'=>$factory->create(Juego::class)->id

//     ];
// });
// $factory->define(Respuesta::class, function (Faker $faker) use ($factory) {
//     return [
//         'cuerpo' => $faker->paragraph(1),
//         'correcta' => $faker->numberBetween(0, 1)
//         // 'pregunta_id'=>$factory->create(Pregunta::class)->id

//     ];
// });

// });

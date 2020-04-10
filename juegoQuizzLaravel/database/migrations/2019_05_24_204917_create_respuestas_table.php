<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('juego_id');
            $table->unsignedBigInteger('pregunta_id')->nullable();
            $table->bigInteger('puntaje')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('juegos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('image_profile', 200)->nullable()->default('noimage.png');
            //  $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
        // Schema::table('juegos',function (Blueprint $table){
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
        Schema::table('logros', function (Blueprint $table) {
            $table->foreign('juego_id')->references('id')->on('juegos')->onDelete('cascade');
        });

        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('detalle');
            $table->unsignedBigInteger('juego_id');
            $table->timestamps();
        });

        Schema::table('preguntas', function (Blueprint $table) {
            $table->foreign('juego_id')->references('id')->on('juegos')->onDelete('cascade');
        });

        Schema::create('respuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('cuerpo');
            $table->boolean('correcta')->default(false);
            $table->unsignedBigInteger('pregunta_id');
            $table->timestamps();

            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { }
}

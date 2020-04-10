<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 191)->unique()->nullable();
            $table->string('image_profile', 200)->nullable()->default('avatar.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->nullable()->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('logros');
        Schema::dropIfExists('juegos');
        Schema::dropIfExists('users');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image_profile'
    ];
    // protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function logros()
    {
        return $this->hasMany(Logro::class);
    }
    public function juegos()
    {
        return $this->belongsToMany(Juego::class, 'logros')->withTimestamps()->withPivot('pregunta_id', 'puntaje');
        //unis la tabla usuario con logros a traves de la tabla intermedia logros, segundo parametro
        //belongsToMany despues se llama con roles()->attach(); buscar

    }
}

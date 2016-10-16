<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tipo','edicion_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Relation to table edicion one to many
     */
    public function ediciones()
    {
        return $this->hasMany('App\Edicion');
    }
    /**
     * Relation to table edicion one to many
     */
    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }
    /**
     * Relation to table edicion one to many
     */
    public function modulos()
    {
        return $this->hasMany('App\Modulo');
    }
    /**
     * Relation to table edicion many to one
     */
    public function edicion()
    {
        return $this->belongsTo('App\Edicion');
    }
}

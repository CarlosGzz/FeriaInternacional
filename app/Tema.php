<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'idTema'
    ];
    /**
     * Relation to table eventos one to many
     */
    public function evento()
    {
        return $this->hasMany('App\Evento');
    }
    /**
     * Relation to table modulos one to many
     */
    public function modulo()
    {
        return $this->hasMany('App\Modulo');
    }
    /**
     * Relation to table subtemas one to many
     */
    public function subtema()
    {
        return $this->hasMany('App\Subtema');
    }
    /**
     * Relation to table ediciones many to many
     */
    public function ediciones()
    {
        return $this->belongsToMany('App\Edicion');
    }
}

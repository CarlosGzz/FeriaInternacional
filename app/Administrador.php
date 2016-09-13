<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{

    protected $table = "administradores";
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'nombre', 'correo', 'tipo', 'creador', 'edicion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @hidden array
     */
    protected $hidden = [
        'contrasena'
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
}

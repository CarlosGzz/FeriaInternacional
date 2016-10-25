<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = "usuarios";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'correo', 'contraseña','carrera','semestre','puntos',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contraseña',
    ];

    /**
     * Relation to table edicion one to many
     */
    public function temas()
    {
        return $this->belongsToMany('App\Tema');
    }

    /**
     * Relation to table edicion one to many
     */
    public function eventos()
    {
        return $this->belongsToMany('App\Evento');
    }

    /**
     * Relation to table edicion one to many
     */
    public function modulos()
    {
        return $this->belongsToMany('App\Modulo');
    }
}

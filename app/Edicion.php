<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edicion extends Model
{
    protected $table = "ediciones";
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'pais', 'fechaInicio','fechaFinal','logo', 'administrador_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @hidden array
     */
    protected $hidden = [
        'id'
    ];
    /**
     * Relation to table eventos one to many
     */
    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }
    /**
     * Relation to table modulos one to many
     */
    public function modulos()
    {
        return $this->hasMany('App\Modulo');
    }
    /**
     * Relation to table temas many to many
     */
    public function temas()
    {
        return $this->belongsToMany('App\Tema');
    }
    /**
     * Relation to table temas one to many
     */
    public function administrador()
    {
        return $this->belongsTo('App\Administrador');
    }
}

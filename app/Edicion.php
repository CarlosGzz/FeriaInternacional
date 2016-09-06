<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edicion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'pais', 'fechaInicio','fechaFinal','logo', 'estatus', 'creador'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @hidden array
     */
    protected $hidden = [
        'idEdicion'
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
        return $this->belongsToMany('App\Temas');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creador', 'titulo','tema_id','tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'edicion_id'
    ];

    /**
     * Relation to table edicion one to many
     */
    public function edicion()
    {
        return $this->belongsTo('App\Edicion');
    }

    /**
     * Relation to table temas one to many
     */
    public function tema()
    {
        return $this->belongsTo('App\Tema');
    }

    /**
     * Relation to table subtemas many to many
     */
    public function subtemas()
    {
        return $this->belongsToMany('App\Subtema');
    }

    /**
     * Relation to table contenidos one to many
     */
    public function contenidos()
    {
        return $this->hasMany('App\Contenido');
    }

    /**
     * Relation to table administrador one to many
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Relation to table subtemas many to many
     */
    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario');
    }
}

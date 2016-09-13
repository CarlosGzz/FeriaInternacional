<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtema extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'tema_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];
    /**
     * Relation to table temas one to many
     */
    public function tema()
    {
        return $this->belongsTo('App\Tema');
    }
    /**
     * Relation to evento eventos many to many
     */
    public function eventos()
    {
        return $this->belongsToMany('App\Evento');
    }
    /**
     * Relation to modulos eventos many to many
     */
    public function modulos()
    {
        return $this->belongsToMany('App\Modulo');
    }
}

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'idModulo', 'idEdicion',
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
}

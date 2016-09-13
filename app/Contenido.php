<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
	protected $table = "contenidos";
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'modulo_id','formato','contenido','secuencia'
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
    public function modulo()
    {
        return $this->belongsTo('App\Modulo');
    }
    /**
     * Relation to table modulos one to many
     */
    public function formato()
    {
        return $this->belongsTo('App\Formato');
    }
}

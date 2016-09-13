<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
	protected $table = "formatos";
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'formato'
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
     * Relation to table contenidos one to many
     */
    public function contenidos()
    {
        return $this->hasMany('App\Contenido');
    }
}

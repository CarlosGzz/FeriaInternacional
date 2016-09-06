<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'nombre', 'correo','fechaFinal','logo', 'creador'
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
}

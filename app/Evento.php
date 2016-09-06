<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'fechaInicio', 'fechaFinal','lugar','descripcion','tema','tipo', 'encargado', 'estatus', 'registroDeAsistencia', 'audienciaInteresada', 'comentarios', 'creador'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'idEvento', 'idEdicion',
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
}
}

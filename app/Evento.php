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
        'titulo','edicion_id', 'fechaInicio', 'fechaFinal','lugar','descripcion','tema_id','tipo', 'encargado', 'estatus', 'registroDeAsistencia', 'audienciaInteresada', 'comentarios', 'user_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'edicion_id',
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
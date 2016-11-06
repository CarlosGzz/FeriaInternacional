<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Edicion;
use App\Evento;
use App\Modulo;
use App\Tema;
use App\Subtema;
use App\Usuario;

class AplicacionController extends Controller
{
    private $edicionId;
    /**
     * Create a new controller instance and validation of user auth.
     *
     * @return void
     */
    public function __construct()
    {
        $this->edicionId = EdicionesController::edicionEditando();
    }
	/**
     * Display a listing of the Edicion in a json file.
     *
     * @return \Illuminate\Http\Response
     */
    public function edicion()
    {
        $edicion = Edicion::where('estatus','publicado')->get(['pais','fechaInicio','fechaFinal']);
        echo json_encode($edicion); 
    }
    /**
     * Display a listing of the Eventos in a json file.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventos()
    {
        $eventos = Evento::where('edicion_id',$this->edicionId)->where('estatus','2')->orderBy('titulo','ASC')->get(['id','titulo','fechaInicio','fechaFinal','lugar','descripcion']);
        echo json_encode($eventos); 
    }
    /**
     * Display a listing of the Temas in a json file.
     *
     * @return \Illuminate\Http\Response
     */
    public function temas()
    {
        $eventos = Evento::where('edicion_id',$this->edicionId)->where('estatus','2')->orderBy('titulo','ASC')->get();
        $temas = array();
        foreach ($eventos as $evento) {
            //dd($evento->tema());
            $tema = $evento->tema;
            array_push($temas, $tema->nombre);
        }
        echo json_encode(array_unique($temas)); 
    }
    /**
     * Display a listing of the Subtemas in a json file.
     *
     * @return \Illuminate\Http\Response
     */
    public function subtemas()
    {
        $eventos = Evento::where('edicion_id',$this->edicionId)->where('estatus','2')->orderBy('titulo','ASC')->get();
        $subtemas = array();
        foreach ($eventos as $evento) {
            //dd($evento->tema());
            foreach ($evento->subtemas as $subtema) {
                array_push($subtemas, $subtema->nombre);
            }
        }
        echo json_encode(array_unique($subtemas)); 
    }
    /**
     * Display a listing of the Subtemas in a json file.
     *
     * @return \Illuminate\Http\Response
     */
    public function contenido()
    {
        $modulos = Modulo::where('edicion_id',$this->edicionId)->where('estatus','2')->orderBy('titulo','ASC')->get();
        $modulosArray = array();
        foreach ($modulos as $modulo ) {
            $contenidosArray = array();
            $moduloArray = array();
            $moduloArray['titulo'] = $modulo->titulo;
            $moduloArray['tema'] = $modulo->tema->nombre;
            foreach ($modulo->contenidos as $contenido) {
                $contenidoArray = array();
                $contenidoArray['formato'] = $contenido->formato;
                $contenidoArray['contenido'] = $contenido->contenido;
                $contenidoArray['secuencia'] = $contenido->secuencia;
                array_push($contenidosArray,$contenidoArray);
            }
            $moduloArray['contenido'] = $contenidosArray;
            array_push($modulosArray, $moduloArray);
        }
       // dd($modulosArray);
        echo json_encode($modulosArray); 
    }
}

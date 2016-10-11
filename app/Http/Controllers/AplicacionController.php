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

	/**
     * Display a listing of the Edicion in a json file.
     *
     * @return \Illuminate\Http\Response
     */
    public function edicion()
    {
        $edicion = Edicion::where('estatus','activo')->get(['pais','fechaInicio','fechaFinal']);
        echo json_encode($edicion); 
    }
    /**
     * Display a listing of the Eventos in a json file.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventos()
    {
        $eventos = Evento::where('estatus','2')->get(['titulo','fechaInicio','fechaFinal','lugar','descripcion']);
        echo json_encode($eventos); 
    }
}

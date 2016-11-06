<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tema;

use App\Edicion;

use App\Http\Requests\TemaRequest;

use DB;

class TemaController extends Controller
{
    private $edicionId;
    /**
     * Create a new controller instance and validation of user auth.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->edicionId = EdicionesController::edicionEditando();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Tema::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add theme through new event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function nuevoTemaPorEventoOModulo($tema,$edicionId)
    {
        $temaNuevo = new Tema();
        $temaNuevo->nombre = $tema;
        //$temaNuevo->save();
        $edicion = Edicion::find($edicionId);
        $edicion->temas()->save($temaNuevo);
        return $temaNuevo;
    }
    /**
     * Get all themes in edition
     *
     * 
     * @return string pais
     */
    public static function temasEnEdicion($edicionId)
    {
        $temas = DB::table('temas')
            ->join('edicion_tema', 'temas.id', '=', 'edicion_tema.tema_id')
            ->where('edicion_tema.edicion_id',$edicionId)
            ->get();
        return $temas;
    }

}

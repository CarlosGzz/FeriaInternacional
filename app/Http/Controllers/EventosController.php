<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Evento;

use App\Subtema;

use App\Tema;

use App\Http\Requests\EventosRequest;

use DB;
class EventosController extends Controller
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
        if ($this->edicionId == 0) {
            return redirect()->route('edicion.ediciones.index');
        }
        $eventos = Evento::where('edicion_id',$this->edicionId)->orderBy('titulo','ASC')->paginate(10);
        return view('evento.index')->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtemasArray = array();
        $temasArray = array();
        $subtemas = SubtemaController::subtemasEnEdicion();
        foreach ($subtemas as $subtema) {
            $subtemasArray[$subtema->id] = $subtema->nombre;
        }
        $temas = TemaController::temasEnEdicion($this->edicionId);
        foreach ($temas as $tema) {
            $temasArray[$tema->id] = $tema->nombre;
        }
        return view('evento.create')->with('temasArray',$temasArray)->with('subtemasArray',$subtemasArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventosRequest $request)
    {
        $evento = new Evento($request->all());
        $evento->edicion_id = $this->edicionId;

        // Temas
        if(!is_numeric($request->tema_id)){
            $tema= TemaController::nuevoTemaPorEventoOModulo($request->tema_id,$this->edicionId);
            $evento->tema()->save($tema);
            $tema_id= $tema->id;
        }
        $evento->save();

        // Subtemas
        if(isset($request->subtemas)){
            if(is_array($request->subtemas)){
                foreach ($request->subtemas as $subtema) {
                    $subtemaX = Subtema::find($subtema);
                    $evento->subtemas()->save($subtemaX);
                }
            }else{
                $subtemasNuevos = explode(",",$request->subtemas );
                foreach ($subtemasNuevos as $subtemaNuevo) {
                    $subtemaX = new Subtema();
                    $subtemaX->tema_id = $evento->tema_id;
                    $subtemaX->nombre = $subtemaNuevo;
                    $evento->subtemas()->save($subtemaX);
                }
            }
        }
        $evento->save();
        flash('Evento '.$evento->titulo.' creado exitosamente','success');
        return redirect()->route('evento.eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('evento.show')->with('evento', $evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subtemasArray = array();
        $temasArray = array();
        $subtemas = SubtemaController::subtemasEnEdicion();
        foreach ($subtemas as $subtema) {
            $subtemasArray[$subtema->id] = $subtema->nombre;
        }
        $temas = TemaController::temasEnEdicion($this->edicionId);
        foreach ($temas as $tema) {
            $temasArray[$tema->id] = $tema->nombre;
        }
        $evento = Evento::find($id);
        return view('evento.edit')->with('evento', $evento)->with('temasArray',$temasArray)->with('subtemasArray',$subtemasArray);
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
        $evento = Evento::find($id);
        $evento->titulo = $request->titulo;
        $evento->fechaInicio = $request->fechaInicio;
        $evento->fechaFinal = $request->fechaFinal;
        $evento->lugar = $request->lugar;
        $evento->tipo = $request->tipo;
        $evento->estatus = $request->estatus;

        if($request->descripcion){
            $evento->descripcion = $request->descripcion;
        }
        if($request->encargado){
            $evento->encargado = $request->encargado;
        }
        if($request->registroAsistencia){
            $evento->registroAsistencia = $request->registroAsistencia;
        }
        if($request->audienciaInteresada){
            $evento->audienciaInteresada = $request->audienciaInteresada;
        }
        if($request->comentarios){
            $evento->comentarios = $request->comentarios;
        }

        // Temas
        if(!is_numeric($request->tema_id)){
            $tema= TemaController::nuevoTemaPorEventoOModulo($request->tema_id,$this->edicionId);
            $evento->tema()->save($tema);
            $tema_id= $tema->id;
        }else{
            $evento->tema_id = $request->tema_id;
        }
        $evento->save();

        // Subtemas
        if(isset($request->subtemas)){
            if(is_array($request->subtemas)){
                foreach ($request->subtemas as $subtema) {
                    $subtemaX = Subtema::find($subtema);
                    $evento->subtemas()->save($subtemaX);
                }
            }else{
                $subtemasNuevos = explode(",",$request->subtemas );
                foreach ($subtemasNuevos as $subtemaNuevo) {
                    $subtemaX = new Subtema();
                    $subtemaX->tema_id = $evento->tema_id;
                    $subtemaX->nombre = $subtemaNuevo;
                    $evento->subtemas()->save($subtemaX);
                }
            }
        }
        $evento->save();
        flash('Evento '.$evento->titulo.' actualizado exitosamente','success');
        return redirect()->route('evento.eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();
        flash('Evento '.$edicion->pais.' eliminado exitosamente','danger');
        return redirect()->route('evento.eventos.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewCalendario()
    {   
        $eventos = Evento::all();
        return view('pages.eventos', compact('eventos'));
    }
}

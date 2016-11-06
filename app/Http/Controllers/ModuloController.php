<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modulo;

use App\Subtema;

use App\Tema;

use App\Contenido;

use App\Http\Requests;

use Carbon\Carbon;

class ModuloController extends Controller
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
        $modulos = Modulo::where('edicion_id',$this->edicionId)->orderBy('id', 'ASC')->paginate(10);
        return view('modulo.index')->with('modulos', $modulos);
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
        return view('modulo.create')->with('temasArray',$temasArray)->with('subtemasArray',$subtemasArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $modulo = new Modulo();
        $modulo->titulo = $request->titulo;
        $modulo->tipo = $request->tipo;
        $modulo->edicion_id = $this->edicionId;
        $modulo->estatus = $request->estatus;
        $modulo->user_id = $request->administrador_id;
        // Temas
        if(!is_numeric($request->tema_id)){
            $tema_id = TemaController::nuevoTemaPorEventoOModulo($request->tema_id,$this->edicionId);
            $modulo->tema_id = $tema_id;
        }else{
            $modulo->tema_id = $request->tema_id;
        }
        $modulo->save();

        // Subtemas
        if(isset($request->subtemas)){
            if(is_array($request->subtemas)){
                foreach ($request->subtemas as $subtema) {
                    $subtemaX = Subtema::find($subtema);
                    $modulo->subtemas()->save($subtemaX);
                }
            }else{
                $subtemasNuevos = explode(",",$request->subtemas );
                foreach ($subtemasNuevos as $subtemaNuevo) {
                    $subtemaX = new Subtema();
                    $subtemaX->tema_id = $modulo->tema_id;
                    $subtemaX->nombre = $subtemaNuevo;
                    $modulo->subtemas()->save($subtemaX);
                }
            }
        }
        //Contenido
        if(isset($request->contenido)){
            $contador = 0;
            foreach ($request->contenido as $contenido) {
                $key = array_keys($contenido);
                $contenidoNuevo = new Contenido();
                $contenidoNuevo->modulo_id = $modulo->id;
                $contenidoNuevo->formato = implode("",$key);
                $contenidoNuevo->contenido = implode("",$contenido);
                $contenidoNuevo->secuencia = $contador;
                $contenidoNuevo->created_at = Carbon::now();
                $contenidoNuevo->updated_at = Carbon::now();
                $modulo->contenidos()->save($contenidoNuevo);
                $contador++; 
            }
        }
        Storage::disk('local')->put('file.txt', 'Contents');
        // Trivia
        if(isset($request->trivia))
        $modulo->save();
        flash('Modulo '.$modulo->titulo.' creado exitosamente','success');
        return redirect()->route('contenido.contenidos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modulo = Modulo::find($id);
        return view('modulo.show')->with('modulo', $modulo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
}

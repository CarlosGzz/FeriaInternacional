<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Edicion;

use App\Http\Requests\EdicionRequest;


class EdicionesController extends Controller
{
    /**
     * Create a new controller instance and validation of user auth.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edicionEditando = Edicion::where('modo','1')->first();
        $edicionPublicada = Edicion::where('estatus','publicado')->first();
        $edicionesPlaneadas = Edicion::where('estatus','planeado')->orderBy('id', 'ASC')->paginate(5);
        $edicionesPasadas = Edicion::where('estatus','pasado')->orderBy('id', 'ASC')->paginate(5);
        return view('edicion.index')->with('edicionesPlaneadas', $edicionesPlaneadas)->with('edicionPublicada',$edicionPublicada)->with('edicionesPasadas',$edicionesPasadas)->with('edicionEditando',$edicionEditando);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edicion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EdicionRequest $request)
    {
        $edicion = new Edicion($request->all());
        if($edicion->estatus == 'publicado'){
            $ediciones = Edicion::all();
            foreach ($ediciones as $ed) {
                $ed->estatus = "planeado";
                $ed->save();
            }
        }
        $edicion->save();
        flash('Edicion '.$edicion->pais.' creada exitosamente','success');
        return redirect()->route('edicion.ediciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edicion = Edicion::find($id);
        return view('edicion.show')->with('edicion', $edicion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edicion = Edicion::find($id);
        return view('edicion.edit')->with('edicion', $edicion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EdicionRequest $request, $id)
    {
        $edicion = Edicion::find($id);
        $edicion->pais = $request->pais;
        $edicion->fechaInicio = $request->fechaInicio;
        $edicion->fechaFinal = $request->fechaFinal;
        $edicion->logo = $request->logo;
        if($edicion->estatus == 'publicado'){
            $ediciones = Edicion::all();
            foreach ($ediciones as $ed) {
                if ($ed->id != $edicion->id) {
                    if($ed->estatus == 'publicado')
                        $ed->estatus = "planeado";
                    $ed->save();
                }
            }
            
        }
        $edicion->estatus = $request->estatus;
        if(isset($request->modo)){
            $ediciones = Edicion::all();
            foreach ($ediciones as $ed) {
                if ($ed->id != $edicion->id) {
                    if($ed->modo && $ed->id!=$edicion->id){
                        $ed->modo = "0";
                        $ed->save();
                    }
                }
            }
            $edicion->modo = $request->modo;
        }else{
            $edicion->modo = 0;
        }
        $edicion->save();
        return redirect()->route('edicion.ediciones.show',$edicion->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edicion = Edicion::find($id);
        $edicion->delete();
        flash('Edicion '.$edicion->pais.' eliminada exitosamente','danger');
        return redirect()->route('edicion.ediciones.index');
    }
    /**
     * Check which edition is editing
     *
     * 
     * @return string pais
     */
    public static function edicionEditando()
    {
        $edicionPublicada = Edicion::where('modo','1')->first();
        if (empty($edicionPublicada)) {
            return 0;
        }
        return $edicionPublicada->id;
    }


}

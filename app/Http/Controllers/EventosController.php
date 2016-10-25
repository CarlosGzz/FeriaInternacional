<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Evento;

use App\Tema;

use App\Edicion;

use App\Http\Requests\EventosRequest;

class EventosController extends Controller
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
        $edicion = Edicion::where('modo','1')->first();
        $eventos = Evento::where('edicion_id',$edicion->id)->orderBy('titulo','ASC')->paginate(5);
        return view('evento.index')->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selectString = "";
        $optionArray = array();
        $temas = Tema::all();
        foreach ($temas as $tema) {
            $optionArray[$tema->id] = $tema->nombre;
        }
        return view('evento.create')->with('optionArray',$optionArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento($request->all());
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
        if(empty($edit_delete)){
            $edit_delete = 0;
        }
        $evento = Evento::find($id);
        return view('evento.show')->with('evento', $evento)->with('edit_delete',$edit_delete);
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
        /*$evento = Evento::find($id);
        $evento->delete();
        flash('Evento '.$edicion->pais.' eliminado exitosamente','danger');
        return redirect()->route('evento.eventos.index');*/
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

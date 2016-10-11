<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Edicion;

use App\Http\Requests\EdicionRequest;


class EdicionesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ediciones = Edicion::orderBy('id', 'ASC')->paginate(5);
        return view('edicion.index')->with('ediciones', $ediciones);
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
        $edicion->estatus = $request->estatus;
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
}

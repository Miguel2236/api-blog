<?php

namespace App\Http\Controllers;

use App\Departament;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar departamentos
        // $departamentos = Departament::all();
        $departamentos = Departament::where('bActivo', 1)->get();

        return view('dep.list',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // formulario para crear nuevo departamento
        return view('dep.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // crear nuevo departamento
        $DEP = new Departament();

        $DEP->nombre = $request->input('nombre');

        $DEP->observacion = $request->input('observacion');

        $DEP->bActivo = 1;

        $DEP->save();

        return redirect()->route('dep.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mostrar informacion general deun registro
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // formulario de edición

        $dep = Departament::find($id);

        return view('dep.edit',compact('dep'));
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
        // actualizar registro
        $cat = Departament::findOrFail($id)->update($request->all());

        return redirect()->route('dep.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function erase(Request $request, $id)
    {
        // borrado lógico de un registro
        Departament::findOrFail($id)->update($request->all());

        return redirect()->route('dep.list');
    }

    public function destroy($id)
    {
        // eliminar registro
    }
}

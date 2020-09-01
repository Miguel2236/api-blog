<?php

namespace App\Http\Controllers;

use DB;
use App\Departament;
use App\Supervisor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // listar supervisores
        $supervisores = DB::table('supervisors')
                        ->join('departaments','supervisors.departament_id','=','departaments.id')
                        ->select('supervisors.id','supervisors.clave','supervisors.nombre','supervisors.salario','departaments.nombre as departamento')
                        ->get();

        return view('sup.list', compact('supervisores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // formulario para guardr supervisores
        $departament = Departament::where('bActivo', 1)->get();

        return view('sup.nuevo', compact('departament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // crear un supervisor
        $Sup = new Supervisor();

        $Sup->clave = $request->input('clave');

        $Sup->nombre = $request->input('nombre');

        $Sup->salario = $request->input('salario');

        $Sup->departament_id = $request->input('departament_id');
        
        $Sup->save();

        return redirect()->route('sup.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mostrar un supervisor
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // formulario de edicion
        $supervisor = Supervisor::findOrFail($id)->get();
        $departamentos = Departament::where('bActivo', 1)->get();

        return view('sup.edit')->with('data', compact('supervisor', 'departamentos'));
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
        // actualizar un supervisor
        $Sup = Supervisor::find($id);

        $Sup->clave = $request->input('clave');

        $Sup->nombre = $request->input('nombre');

        $Sup->salario = $request->input('salario');

        $Sup->departament_id = $request->input('departament_id');

        $Sup->save();
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
        Supervisor::findOrFail($id)->update($request->all());

        return redirect()->route('sup.list');
    }

    public function destroy($id)
    {
        // eliminar un supervisor
    }
}

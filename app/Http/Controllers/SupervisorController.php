<?php

namespace App\Http\Controllers;

use DB;
use PDF;
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
                        ->where('supervisors.bActivo', 1)
                        ->get();

        return view('sup.list', compact('supervisores'));
    }

    public function report()
    {
        // Generar un reporte en PDF
        $supervisores = DB::table('supervisors')
                        ->join('departaments','supervisors.departament_id','=','departaments.id')
                        ->select('supervisors.id','supervisors.clave','supervisors.nombre','supervisors.salario','departaments.nombre as departamento')
                        ->where('supervisors.bActivo', 1)
                        ->get();

        $report = '';
        $report .='<h1>Reporte de Supervisores</h1>';
        $report .='<br>';
        $report .='<table border="2">';
        $report .='<thead>';
        $report .='<tr>';
        $report .='<th>Clave</th>';
        $report .='<th>Nombre</th>';
        $report .='<th>Salario</th>';
        $report .='<th>Departamento</th>';
        $report .='</tr>';
        $report .='</thead>';
        $report .='<tbody>';
        foreach (json_decode($supervisores) as $sup)
        {
            $report .='<tr>';
            $report .='<td>'.$sup->clave.'</td>';
            $report .='<td>'.$sup->nombre.'</td>';
            $report .='<td>'.$sup->salario.'</td>';
            $report .='<td>'.$sup->departamento.'</td>';
            $report .='</tr>';
        }
        $report .='</tbody>';
        $report .='</table>';
        
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($report);
        return $pdf->stream();
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
        $clave = $request->input('clave');

        $row = Supervisor::where('clave', $clave)->get();

        if (count($row) == 0)
        {
            $Sup = new Supervisor();

            $Sup->clave = $request->input('clave');

            $Sup->nombre = $request->input('nombre');

            $Sup->salario = $request->input('salario');

            $Sup->departament_id = $request->input('departament_id');
            
            $Sup->save();

            return redirect()->route('sup.list');
        }
        else
        {
            return view('sup.error');
        }
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

    public function search(Request $request)
    {
        // búsqueda de un supervisor usando su clave
        $supervisor = DB::table('supervisors')
                        ->join('departaments','supervisors.departament_id','=','departaments.id')
                        ->select('supervisors.id','supervisors.clave','supervisors.nombre','supervisors.salario','departaments.nombre as departamento')
                        ->where('clave', $request->input('clave'))
                        ->get();

        if (count($supervisor) != 0)
        {
            return view('sup.info', compact('supervisor'));
        }
        else
        {
            return view('sup.error');
        }
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
        $supervisor = Supervisor::findOrFail($id);
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
        $Sup = Supervisor::findOrFail($id);

        $Sup->clave = $request->input('clave');

        $Sup->nombre = $request->input('nombre');

        $Sup->salario = $request->input('salario');

        $Sup->departament_id = $request->input('departament_id');

        $Sup->save();

        return redirect()->route('sup.list');
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
        $Sup = Supervisor::findOrFail($id);

        $Sup->bActivo = 0;

        $Sup->save();

        return redirect()->route('sup.list');
    }

    public function destroy($id)
    {
        // eliminar un supervisor
        Supervisor::findOrFail($id)->delete();

        return redirect()->route('sup.list');
    }
}

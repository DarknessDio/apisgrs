<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return json_encode(['empleados' => $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->id = $request->id;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->posicion = $request->posicion;
        $empleado->horario = $request->horario;
        $empleado->save();
        return json_encode(['empleado' => $empleado]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado= Empleado::find($id);
        if(is_null($empleado)){
            return abort(404);
        }
        return json_encode(['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empleado= Empleado::find($id);
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->posicion = $request->posicion;
        $empleado->horario = $request->horario;
        $empleado->save();
        return json_encode(['empleado' => $empleado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado= Empleado::find($id);
        $empleado->delete();

        $empleados = Empleado::all();
        return json_encode(['empleados' => $empleados, 'success' => true]);
    }
}

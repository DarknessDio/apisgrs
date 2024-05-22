<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = DB::table('citas')
        ->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
        ->join('servicios', 'servicios.id', '=', 'citas.servicio_id') 
        ->join('empleados', 'empleados.id', '=', 'citas.empleado_id')  
        ->select('citas.*',  'clientes.nombre as cliente', 'servicios.nombre as servicio','empleados.nombre as empleado')
        ->get();
        return json_encode(['citas' => $citas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cita = new Cita();
        $cita->cliente_id = $request->cliente_id;
        $cita->servicio_id = $request->servicio_id;
        $cita->empleado_id = $request->empleado_id;
        $cita->fecha = $request->fecha;
        $cita->estado = $request->estado; 
        $cita->save();
        return json_encode(['cita' => $cita]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita= Cita::find($id);
        $clientes = Cliente::all();
        $servicios = Servicio::all();
        $empleados = Empleado::all();
        if(is_null($cita)){
            return abort(404);
        }
        return json_encode(['cita' => $cita, 'clientes' => $clientes, 'servicios' => $servicios, 'empleados' => $empleados]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cita= Cita::find($id);
        $cita->cliente_id = $request->cliente_id;
        $cita->servicio_id = $request->servicio_id;
        $cita->empleado_id = $request->empleado_id;
        $cita->fecha = $request->fecha;
        $cita->estado = $request->estado; 
        $cita->save();
        return json_encode(['cita' => $cita]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita= Cita::find($id);
        $cita->delete();

        $citas = DB::table('citas')
        ->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
        ->join('servicios', 'servicios.id', '=', 'citas.servicio_id') 
        ->join('empleados', 'empleados.id', '=', 'citas.empleado_id')  
        ->select('citas.*',  'clientes.nombre as cliente, servicios.nombre as servicio,empleados.nombre as empleado ')
        ->get();
        return json_encode(['citas' => $citas, 'success' => true]);
    }
}

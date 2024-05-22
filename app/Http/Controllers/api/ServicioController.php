<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return json_encode(['servicios' => $servicios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $servicio = new Servicio();
        $servicio->id = $request->id;
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->save();
        return json_encode(['servicio' => $servicio]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servicio= Servicio::find($id);
        if(is_null($servicio)){
            return abort(404);
        }
        return json_encode(['servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $servicio= Servicio::find($id);
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->save();
        return json_encode(['servicio' => $servicio]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicio= Servicio::find($id);
        $servicio->delete();
    
        $servicios = Servicio::all();
        return json_encode(['servicios' => $servicios, 'success' => true]);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = DB::table('ventas')
        ->join('productos', 'productos.id', '=', 'ventas.producto_id') 
        ->select('ventas.*',  'productos.nombre as producto')
        ->get();
        return json_encode(['ventas' => $ventas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->id = $request->id;
        $venta->producto_id = $request->producto_id;
        $venta->cantidad = $request->cantidad;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->total = $request->total;
        $venta->save();
        return json_encode(['venta' => $venta]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta= Venta::find($id);
        $productos = Producto::all();
        if(is_null($venta)){
            return abort(404);
        }
        return json_encode(['venta' => $venta, 'productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venta= Venta::find($id);
        $venta->producto_id = $request->producto_id;
        $venta->cantidad = $request->cantidad;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->total = $request->total;
        $venta->save();
        return json_encode(['venta' => $venta]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta= Venta::find($id);
        $venta->delete();

        $ventas = DB::table('ventas')
        ->join('productos', 'productos.id', '=', 'ventas.producto_id') 
        ->select('ventas.*',  'productos.nombre as producto')
        ->get();
        return json_encode(['ventas' => $ventas, 'success' => true]);
    }
}

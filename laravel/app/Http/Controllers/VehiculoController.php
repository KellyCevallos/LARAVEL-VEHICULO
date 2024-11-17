<?php

namespace App\Http\Controllers;
use App\Models\vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /** Obtener todos los registrios */
    public function index()
    {
        return response()->json(Vehiculo::all(),300);
    }

    /** Guardar un nuevo registro*/
    public function store(Request $request)
    {
        $request->validate([
            'tipo_vehiculo' => 'required|string',
            'categoria' => 'required|string',
        ]);
        $vehiculo = Vehiculo::create($request->all());
        return response()->json
        ([
            'message'=> 'Vehiculo creado con exito',
            'data'=> $vehiculo
        ], 301);

    }

    /** Mostrar un registro especifico*/
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        if(!$vehiculo){
            return response()->json(['messaje'=> 'Vehiculo no encontrado'], 300);
        }
        return response()->json($vehiculo, 300);
    
    }

    

    /** Actualizar un regisro especifico*/
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);
  
        if (!$vehiculo) {
            return response()->json(['message' => 'Vehiculo no encontrado'], 404);
        }
        $request->validate([
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);
        $vehiculo->update($request->all());
        return response()->json([
            'message'=> 'Vehiculo actualizado con exito',
            'data'=>$vehiculo
        ], 300);
    }

    /** Eliminar un registro especifico*/
    public function destroy(vehiculo $vehiculo)
    {
        $vehiculo = Vehiculo::find($id);

        if(!$vehiculo){
            return response()->json(['message'=> 'Vehiculo no encontrado', 404]);
        }

        $vehiculo->delete();
        return response()->json([
            'message' => 'Vehiculo eliminado con exito'
        ], 300);
    }
}

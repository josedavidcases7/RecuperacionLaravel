<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public static function obtenerTodosProyectos()
    {
        $proyecto = Proyecto::all();
        return response()->json($proyecto, 200);
    }

    public static function obtenerPorIdProyecto($id)
    {
        $proyecto = Proyecto::find($id);
        if ($proyecto != null) {
            return response()->json($proyecto, 200);
        } else {
            return response()->json(["message" => "Proyecto no encontrado"], 404);
        }
    }
    public static function crearProyecto(Request $proyecto)
    {
        $validated = $proyecto->validate([
            'id_empleado' => 'required|exists:empleado,id',
            'nombre' => 'required|string|unique:proyecto,nombre|max:255',
            'horas_estimadas' => 'required|integer',
        ]);

        $proyecto = Proyecto::create([
            'id_empleado' => $validated['id_empleado'],
            'nombre' => $validated['nombre'],
            'horas_estimadas' => $validated['horas_estimadas'],
        ]);
        return response()->json($proyecto, 201);
    }

    public static function eliminarProyecto($id)
    {
        $proyecto = Proyecto::find($id);


        if (!$proyecto) {
            return response()->json(["message" => "Proyecto no encontrado"], 404);
        }

        $proyecto->delete();

        return response()->json(["message" => "Proyecto eliminado exitosamente"], 200);
    }
    public static function actualizarProyecto(Request $proyecto, $id)
    {
        $validated = $proyecto->validate([
            'id_empleado' => 'required|exists:empleado,id',
            'nombre' => 'required|string|unique:proyecto,nombre|max:255',
            'horas_estimadas' => 'required|integer',
        ]);


        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json(["message" => "Proyecto no encontrado"], 404);
        }


        $proyecto->update($validated);

        return response()->json($proyecto, 200);
    }

    public static function obtenerEmpleadoPorProyecto($proyecto_id)
    {
        $proyecto = Proyecto::find($proyecto_id);

        if (!$proyecto || !$proyecto->empleados) {
            return response()->json(["message" => "Empleado no encontrado para este proyecto"], 404);
        }

        return response()->json($proyecto->empleados, 200);
    }
}

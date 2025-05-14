<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public static function obtenerTodos()
    {
        $proyectos = Proyecto::all();
        if ($proyectos->isEmpty()) {
            return response()->json(["message" => "No hay proyectos registrados"], 404);
        }
        return response()->json($proyectos, 200);
    }

    public static function obtenerPorId($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(["message" => "Proyecto no encontrado"], 404);
        }
        return response()->json($proyecto, 200);
    }

    public static function crear(Request $proyecto)
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

    public static function eliminar($id)
    {
        $proyecto = Proyecto::find($id);


        if (!$proyecto) {
            return response()->json(["message" => "Proyecto no encontrado"], 404);
        }

        $proyecto->delete();

        return response()->json(["message" => "Proyecto eliminado exitosamente"], 200);
    }

    public static function actualizar(Request $proyecto, $id)
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

    public static function obtenerEmpleados($proyecto_id)
    {
        $proyecto = Proyecto::find($proyecto_id);

        if (!$proyecto || !$proyecto->empleados) {
            return response()->json(["message" => "Empleado no encontrado para este proyecto"], 404);
        }
        return response()->json($proyecto->empleados, 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public static function obtenerTodosHorarios()
    {
        $horario = Horario::all();
        return response()->json($horario, 200);
    }

    public static function obtenerPorIdHorario($id)
    {
        $horario = Horario::find($id);
        if ($horario != null) {
            return response()->json($horario, 200);
        } else {
            return response()->json(["message" => "Horario no encontrado"], 404);
        }
    }
    public static function crearHorario(Request $horario)
    {
        $validated = $horario->validate([
            'id_empleado' => 'required|exists:empleado,id',
            'hora_entrada' => 'required|date_format:Y-m-d H:i:s',
            'hora_salida' => 'required|date_format:Y-m-d H:i:s|after:hora_entrada',
        ]);
    
        $horario = Horario::create([
            'id_empleado' => $validated['id_empleado'],
            'hora_entrada' => $validated['hora_entrada'],
            'hora_salida' => $validated['hora_salida'],
        ]);
        return response()->json($horario, 201);
    }

    public static function eliminarHorario($id)
    {
        $horario = Horario::find($id);


        if (!$horario) {
            return response()->json(["message" => "Horario no encontrado"], 404);
        }

        $horario->delete();

        return response()->json(["message" => "Horario eliminado exitosamente"], 200);
    }
    public static function actualizarHorario(Request $horario, $id)
    {
        $validated = $horario->validate([
            'id_empleado' => 'required|exists:empleado,id',
            'hora_entrada' => 'required|date_format:Y-m-d H:i:s',
            'hora_salida' => 'required|date_format:Y-m-d H:i:s|after:hora_entrada',
        ]);


        $horario = Horario::find($id);

        if (!$horario) {
            return response()->json(["message" => "Horario no encontrado"], 404);
        }


        $horario->update($validated);

        return response()->json($horario, 200);
    }

    public static function obtenerEmpleadoPorHorario($horario_id)
    {
        $horario = Horario::find($horario_id);

        if (!$horario || !$horario->empleado) {
            return response()->json(["message" => "Empleado no encontrado para este horario"], 404);
        }

        return response()->json($horario->empleado, 200);
    }
}

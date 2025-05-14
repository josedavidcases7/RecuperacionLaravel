<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public static function obtenerTodos()
    {
        $empleados = Empleado::all();
        if ($empleados->isEmpty()) {
            return response()->json(["message" => "No hay empleados registrados"], 404);
        }
        return response()->json($empleados, 200);
    }

    public static function obtenerPorId($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json(["message" => "Empleado no encontrado"], 404);
        }
        return response()->json($empleado, 200);
    }
    public static function crear(Request $empleado)
    {
        $validated = $empleado->validate([
            'nombre' => 'required|string|max:32',
            'email' => 'required|email|unique:empleado,email|max:64',
            'password' => 'required|string|max:64',
        ]);

        $empleado = Empleado::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'password' => ($validated['password']),
        ]);

        return response()->json($empleado, 201);
    }

    public static function eliminar($id)
    {
        $empleado = Empleado::find($id);


        if (!$empleado) {
            return response()->json(["message" => "Empleado no encontrado"], 404);
        }

        $empleado->delete();

        return response()->json(["message" => "Empleado eliminado exitosamente"], 200);
    }
    public static function actualizar(Request $empleado, $id)
    {
        $validated = $empleado->validate([
            'nombre' => 'required|string|max:32',
            'email' => 'required|email|unique:empleado,email,' . $id . '|max:64',
            'password' => 'required|string|max:64',
        ]);


        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(["message" => "Empleado no encontrado"], 404);
        }


        $empleado->update($validated);

        return response()->json($empleado, 200);
    }

    public static function obtenerHorario($id)
    {
        $empleado = Empleado::with('horario')->find($id);

        if (!$empleado || !$empleado->horario) {
            return response()->json(["message" => "Horario no encontrado"], 404);
        }

        return response()->json($empleado->horario, 200);
    }

    public static function obtenerProyectos($id)
    {
        $empleado = Empleado::with('proyectos')->find($id);

        if (!$empleado || $empleado->proyectos->isEmpty()) {
            return response()->json(["message" => "No hay proyectos para este empleado"], 404);
        }

        return response()->json($empleado->proyectos, 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $empleado = Empleado::where('email', $request->email)->first();

        if (!$empleado || !Hash::check($request->password, $empleado->password)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        $token = $empleado->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }


        $user->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada exitosamente'], 200);
    }
}

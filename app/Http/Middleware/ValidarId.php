<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidarId
{
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');

        if (!is_numeric($id) || (int)$id < 0) {
            return response()->json(['error' => 'El ID debe ser un número entero y positivo'], 400);
        }
        return $next($request);
    }
}

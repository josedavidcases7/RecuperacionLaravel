<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\HorarioController;
use App\Http\Middleware\ValidarId;


Route::get('/obtenerTodosEmpleados', function () {
    return EmpleadoController::obtenerTodosEmpleados();
});

Route::get('/obtenerPorIdEmpleado/{id}', function ($id) {
    return EmpleadoController::obtenerPorIdEmpleado($id);
})->middleware(ValidarId::class);

Route::get('/obtenerProyectosDeEmpleado/{id}', function ($id) {
    return EmpleadoController::obtenerProyectosDeEmpleado($id);
})->middleware(ValidarId::class);

Route::get('/obtenerHorarioDeEmpleado/{id}', function ($id) {
    return EmpleadoController::obtenerHorarioDeEmpleado($id);
})->middleware(ValidarId::class);


Route::post('/crearEmpleado', [EmpleadoController::class, 'crearEmpleado']);

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::delete('/eliminarEmpleado/{id}', function ($id) {
    return EmpleadoController::eliminarEmpleado($id);
})->middleware(ValidarId::class);

Route::put('/actualizarEmpleado/{id}', function ($id) {
    return EmpleadoController::actualizarEmpleado(request(), $id);
})->middleware(ValidarId::class);

Route::middleware('auth:sanctum')->post('/logout', [EmpleadoController::class, 'logout']);

Route::post("/login",[EmpleadoController::class, "login"]);

// Proyectos


Route::get('/obtenerTodosProyectos', function () {
    return ProyectoController::obtenerTodosProyectos();
});

Route::get('/obtenerPorIdProyecto/{id}', function ($id) {
    return ProyectoController::obtenerPorIdProyecto($id);
})->middleware(ValidarId::class);

Route::get('/obtenerEmpleadoPorProyecto/{id}', function ($id) {
    return ProyectoController::obtenerEmpleadoPorProyecto($id);
})->middleware(ValidarId::class);

Route::post('/crearProyecto', [ProyectoController::class, 'crearProyecto']);

Route::delete('/eliminarProyecto/{id}', function ($id) {
    return ProyectoController::eliminarProyecto($id);
})->middleware(ValidarId::class);

Route::put('/actualizarProyecto/{id}', function ($id) {
    return ProyectoController::actualizarProyecto(request(), $id);
})->middleware(ValidarId::class);

// Horarios


Route::get('/obtenerTodosHorarios', function () {
    return HorarioController::obtenerTodosHorarios();
});

Route::get('/obtenerPorIdHorario/{id}', function ($id) {
    return HorarioController::obtenerPorIdHorario($id);
})->middleware(ValidarId::class);

Route::get('/obtenerEmpleadoPorHorario/{id}', function ($id) {
    return HorarioController::obtenerEmpleadoPorHorario($id);
})->middleware(ValidarId::class);

Route::post('/crearHorario', [HorarioController::class, 'crearHorario']);

Route::delete('/eliminarHorario/{id}', function ($id) {
    return HorarioController::eliminarHorario($id);
})->middleware(ValidarId::class);

Route::put('/actualizarHorario/{id}', function ($id) {
    return HorarioController::actualizarHorario(request(), $id);
})->middleware(ValidarId::class);


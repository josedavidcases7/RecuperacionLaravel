<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\HorarioController;
use App\Http\Middleware\ValidarId;


Route::get('/empleados', function () {
    return EmpleadoController::obtenerTodos();
});

Route::get('/empleados/{id}', function ($id) {
    return EmpleadoController::obtenerPorId($id);
})->middleware(ValidarId::class);

Route::get('/empleados/proyectos/{id}', function ($id) {
    return EmpleadoController::obtenerProyectos($id);
})->middleware(ValidarId::class);

Route::get('/empleados/horario/{id}', function ($id) {
    return EmpleadoController::obtenerHorario($id);
})->middleware(ValidarId::class);


Route::post('/empleados', [EmpleadoController::class, 'crear']);

Route::delete('/empleados/{id}', function ($id) {
    return EmpleadoController::eliminar($id);
})->middleware(ValidarId::class);

Route::put('/empleados/{id}', function ($id) {
    return EmpleadoController::actualizar(request(), $id);
})->middleware(ValidarId::class);

Route::middleware('auth:sanctum')->post('/empleados/logout', [EmpleadoController::class, 'logout']);

Route::post("/empleados/login",[EmpleadoController::class, "login"]);

// Proyectos


Route::get('/proyectos', function () {
    return ProyectoController::obtenerTodos();
});

Route::get('/proyectos/{id}', function ($id) {
    return ProyectoController::obtenerPorId($id);
})->middleware(ValidarId::class);

Route::get('/proyectos/empleados/{id}', function ($id) {
    return ProyectoController::obtenerEmpleados($id);
})->middleware(ValidarId::class);

Route::post('/proyectos', [ProyectoController::class, 'crear']);

Route::delete('/proyectos/{id}', function ($id) {
    return ProyectoController::eliminar($id);
})->middleware(ValidarId::class);

Route::put('/proyectos/{id}', function ($id) {
    return ProyectoController::actualizar(request(), $id);
})->middleware(ValidarId::class);

// Horarios


Route::get('/horarios', function () {
    return HorarioController::obtenerTodos();
});

Route::get('/horarios/{id}', function ($id) {
    return HorarioController::obtenerPorId($id);
})->middleware(ValidarId::class);

Route::get('/horarios/empleado/{id}', function ($id) {
    return HorarioController::obtenerEmpleado($id);
})->middleware(ValidarId::class);

Route::post('/horarios', [HorarioController::class, 'crear']);

Route::delete('/horarios/{id}', function ($id) {
    return HorarioController::eliminar($id);
})->middleware(ValidarId::class);

Route::put('/horarios/{id}', function ($id) {
    return HorarioController::actualizar(request(), $id);
})->middleware(ValidarId::class);
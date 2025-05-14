<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertarProyectos extends Seeder
{
    public function run(): void
    {
        DB::table('proyecto')->insert([
            ['id_empleado' => 1, 'nombre' => 'Sistema de Inventario', 'horas_estimadas' => 120],
            ['id_empleado' => 1, 'nombre' => 'Gestión de Clientes', 'horas_estimadas' => 80],
            ['id_empleado' => 2, 'nombre' => 'Plataforma E-learning', 'horas_estimadas' => 200],
            ['id_empleado' => 3, 'nombre' => 'Aplicación Móvil', 'horas_estimadas' => 150],
            ['id_empleado' => 3, 'nombre' => 'Sistema de Reservas', 'horas_estimadas' => 100],
            ['id_empleado' => 4, 'nombre' => 'Automatización de Procesos', 'horas_estimadas' => 90],
            ['id_empleado' => 5, 'nombre' => 'Análisis de Datos', 'horas_estimadas' => 130],
        ]);
    }
}

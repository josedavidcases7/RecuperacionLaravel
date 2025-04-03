<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertarHorarios extends Seeder
{
    public function run(): void
    {
        DB::table('horario')->insert([
            ['id_empleado' => 1, 'hora_entrada' => '2025-03-27 08:00:00', 'hora_salida' => '2025-03-27 16:00:00'],
            ['id_empleado' => 2, 'hora_entrada' => '2025-03-27 09:00:00', 'hora_salida' => '2025-03-27 17:00:00'],
            ['id_empleado' => 3, 'hora_entrada' => '2025-03-27 07:30:00', 'hora_salida' => '2025-03-27 15:30:00'],
            ['id_empleado' => 4, 'hora_entrada' => '2025-03-27 10:00:00', 'hora_salida' => '2025-03-27 18:00:00'],
            ['id_empleado' => 5, 'hora_entrada' => '2025-03-27 06:00:00', 'hora_salida' => '2025-03-27 14:00:00'],
        ]);
    }
}

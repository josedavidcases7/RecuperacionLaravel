<?php

namespace Database\Seeders;

use App\Models\User;

use Database\Seeders\InsertarEmpleados;
use Database\Seeders\InsertarHorarios;
use Database\Seeders\InsertarProyectos;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(InsertarEmpleados::class);
        $this->call(InsertarHorarios::class);
        $this->call(InsertarProyectos::class);
    }
}

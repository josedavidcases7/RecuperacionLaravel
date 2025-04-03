<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InsertarEmpleados extends Seeder
{
    public function run(): void
    {
        DB::table('empleado')->insert([
            ['nombre' => 'Juan', 'email' => 'juan@gmail.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Ana', 'email' => 'ana@gmail.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Luis', 'email' => 'luis@gmail.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Elena', 'email' => 'elena@gmail.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Pedro', 'email' => 'pedro@gmail.com', 'password' => Hash::make('123456')],
        ]);
    }
}

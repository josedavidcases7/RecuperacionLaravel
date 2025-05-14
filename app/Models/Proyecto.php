<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyecto';
    protected $fillable = [
        'id_empleado',
        'nombre',
        'horas_estimadas',
    ];

    public $timestamps = false;

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'proyecto', 'id_empleado', 'id');
    }
}

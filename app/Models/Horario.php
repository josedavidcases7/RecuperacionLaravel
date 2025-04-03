<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horario';
    protected $fillable = [
        'id_empleado', 'hora_entrada', 'hora_salida', 
    ];

    public $timestamps = false;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Empleado extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'empleado';
    protected $fillable = [
        'nombre', 'email', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;

    public function horario()
    {
        return $this->hasOne(Horario::class, 'id_empleado', 'id');
    }
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'id_empleado', 'id');
    }
}
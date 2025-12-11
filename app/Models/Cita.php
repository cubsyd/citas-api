<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'nombre_paciente',
        'nombre_medico',
        'fecha',
        'hora_cita',
        'motivo',
        'estado'
    ];

    protected $casts = [
        'fecha' => 'fecha',
    ];
}

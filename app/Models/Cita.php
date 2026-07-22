<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    // 1. Le decimos exactamente a qué tabla de MySQL se conecta
    protected $table = 'citas';

    // 2. Por seguridad, definimos qué columnas se pueden rellenar desde la App Móvil
    protected $fillable = [
        'usuario_id', 
        'fecha', 
        'hora', 
        'especialidad', 
        'notas', 
        'estado'
    ];
}
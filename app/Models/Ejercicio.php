<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    // Apuntamos a la tabla de la App Móvil
    protected $table = 'exercises';

    // Usamos los nombres EXACTOS de las columnas en la base de datos
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'image_url',
        'body_zone',
        'level',
        'duration_minutes',
        'repetitions'
    ];
}
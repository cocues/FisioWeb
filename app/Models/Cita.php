<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'user_id', 
        'physiotherapist_id',
        'appointment_date', 
        'appointment_time', 
        'specialty', 
        'reason', 
        'status',
        'notes'
    ];

    // ¡NUEVA FUNCIÓN! Le decimos cómo buscar al paciente
    public function paciente()
    {
        // Una cita pertenece a un Usuario (apuntamos a la tabla 'users')
        return $this->belongsTo(User::class, 'user_id');
    }
}
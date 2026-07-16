<?php

use App\Models\Ejercicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ejercicios', function () {
    // Esto va a la base de datos, saca todos los ejercicios y los convierte en JSON
    return response()->json(Ejercicio::all());
});

// ==========================================
// CRUD PARA LA APP MÓVIL - TABLA CITAS
// ==========================================

// 1. LEER (READ) - Obtener todas las citas
Route::get('/citas', function () {
    return response()->json(\App\Models\Cita::all());
});

// 2. CREAR (CREATE) - Guardar una nueva cita desde el celular
Route::post('/citas', function (Request $request) {
    $cita = new \App\Models\Cita();
    $cita->usuario_id = $request->input('usuario_id', 1); // ID del paciente
    $cita->fecha = $request->input('fecha');
    $cita->hora = $request->input('hora');
    $cita->especialidad = $request->input('especialidad');
    $cita->notas = $request->input('notas', '');
    $cita->estado = 'pendiente';
    
    $cita->save();

    return response()->json([
        'mensaje' => 'Cita agendada correctamente',
        'cita' => $cita
    ], 201); // 201 significa "Creado"
});

// 3. ACTUALIZAR (UPDATE) - Cambiar el estado de una cita (ej. confirmada, cancelada)
Route::put('/citas/{id}', function (Request $request, $id) {
    $cita = \App\Models\Cita::find($id);
    
    if (!$cita) {
        return response()->json(['mensaje' => 'Cita no encontrada'], 404);
    }

    // Solo actualizamos lo que nos envíen, si no envían 'estado', se queda igual
    $cita->estado = $request->input('estado', $cita->estado);
    $cita->save();

    return response()->json([
        'mensaje' => 'Cita actualizada con éxito',
        'cita' => $cita
    ]);
});

// 4. BORRAR (DELETE) - Eliminar una cita
Route::delete('/citas/{id}', function ($id) {
    $cita = \App\Models\Cita::find($id);
    
    if ($cita) {
        $cita->delete();
        return response()->json(['mensaje' => 'Cita eliminada correctamente']);
    }

    return response()->json(['mensaje' => 'No se encontró la cita'], 404);
});
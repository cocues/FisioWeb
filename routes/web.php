<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cita; // Importamos el modelo de Citas

// Las rutas de tus otras pantallas
Route::get('/', function () {
    return view('inicio');
});

Route::get('/ejercicios', function () {
    return view('ejercicios');
});

Route::get('/cuestionario', function () {
    return view('cuestionario');
});

Route::get('/progreso', function () {
    return view('progreso');
});

// ¡AQUÍ ESTÁ LA NUEVA RUTA DE CITAS!
Route::get('/citas', function () {
    // 1. Vamos a MySQL y sacamos TODAS las citas ordenadas por fecha
    $citas_bd = Cita::orderBy('fecha', 'asc')->get();
    
    // 2. Le pasamos esos datos a la vista
    return view('citas', ['citas' => $citas_bd]);
});
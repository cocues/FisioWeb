<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cita; // Importamos el modelo de Citas
use Illuminate\Http\Request;

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

// NUEVA RUTA PARA CAMBIAR EL ESTADO DE LA CITA
Route::put('/citas/{id}/estado', function (Request $request, $id) {
    $cita = Cita::find($id); // Buscamos la cita en MySQL
    
    if ($cita) {
        $cita->estado = $request->input('estado'); // Cambiamos a 'confirmada' o 'cancelada'
        $cita->save(); // Guardamos
    }
    
    return redirect('/citas'); // Recargamos la página web automáticamente
});

// ==========================================
// NUEVAS RUTAS PARA CREAR CITA MANUAL
// ==========================================

// 1. Mostrar la pantalla del formulario
Route::get('/citas/crear', function () {
    return view('citas_crear');
});

// 2. Recibir los datos del formulario y guardar en MySQL
Route::post('/citas', function (Request $request) {
    $cita = new Cita();
    $cita->usuario_id = 999; // Usamos 999 para indicar que es un paciente sin cuenta en la app
    $cita->fecha = $request->input('fecha');
    $cita->hora = $request->input('hora');
    $cita->especialidad = $request->input('especialidad');
    $cita->notas = $request->input('notas');
    $cita->estado = 'confirmada'; // Como la hicimos manual, ya nace confirmada
    $cita->save();

    return redirect('/citas'); // Regresamos a la tabla de citas
});
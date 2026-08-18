<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cita;
use Illuminate\Http\Request;
// Importamos la librería de PDF
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () { return view('inicio'); });

// 1. REEMPLAZAMOS LA RUTA DE EJERCICIOS PARA QUE LEA LA BASE DE DATOS
Route::get('/ejercicios', function () { 
    // Obtenemos los ejercicios subidos por los doctores (si la tabla existe)
    try {
        $ejercicios_db = \App\Models\Ejercicio::all();
    } catch (\Exception $e) {
        $ejercicios_db = []; // Si aún no hay tabla, no se rompe
    }
    return view('ejercicios', ['ejercicios_db' => $ejercicios_db]); 
});

Route::get('/cuestionario', function () { return view('cuestionario'); });
Route::get('/progreso', function () { return view('progreso'); });

// RUTA PÚBLICA PARA PACIENTES: Información para pedir cita
Route::get('/agendar-cita', function () { return view('citas_publicas'); });

// ==========================================
// PORTAL DE ACCESO (Login Visual)
// ==========================================
Route::get('/login', function () {
    return view('login');
});

Route::get('/simular-login/{rol}', function ($rol) {
    session(['rol' => $rol]); 
    
    if($rol == 'doctor') {
        return redirect('/dashboard')->with('success', '¡Bienvenido Doctor! Sesión iniciada.');
    } elseif($rol == 'recepcionista') {
        return redirect('/citas')->with('success', '¡Bienvenida Recepcionista! Sesión iniciada.');
    } else {
        return redirect('/')->with('success', '¡Bienvenido Paciente! Sesión iniciada.');
    }
});

Route::get('/logout', function () {
    session()->forget('rol'); 
    return redirect('/')->with('success', 'Sesión cerrada correctamente.');
});

// ==========================================
// ZONA PROTEGIDA POR EL CADENERO (MIDDLEWARE)
// ==========================================
Route::middleware([\App\Http\Middleware\CheckRoleDoctor::class])->group(function () {
    
    // 0. NUEVA RUTA: Dashboard del Doctor (Resumen)
    Route::get('/dashboard', function () {
        if(session('rol') == 'recepcionista') {
            abort(403, 'El Dashboard de métricas es exclusivo para los Médicos Titulares.');
        }

        $hoy = \Carbon\Carbon::now('America/Mexico_City')->toDateString();
        
        // Usamos DB::table('appointments') para saltarnos cualquier conflicto del modelo antiguo
        $citasHoy = \Illuminate\Support\Facades\DB::table('appointments')->whereDate('appointment_date', $hoy)->count();
        $pendientes = \Illuminate\Support\Facades\DB::table('appointments')->where('status', 'pending')->count();
        $confirmadas = \Illuminate\Support\Facades\DB::table('appointments')->where('status', 'approved')->count();
        $totalCitas = \Illuminate\Support\Facades\DB::table('appointments')->count();

        return view('dashboard', [
            'citasHoy' => $citasHoy,
            'pendientes' => $pendientes,
            'confirmadas' => $confirmadas,
            'totalCitas' => $totalCitas
        ]);
    });

    // 1. Pantalla principal de citas
    Route::get('/citas', function () {
        // Usamos DB::table('appointments') para asegurar que lea la tabla correcta sin errores
        $citas_bd = \Illuminate\Support\Facades\DB::table('appointments')->orderBy('appointment_date', 'asc')->get();
        return view('citas', ['citas' => $citas_bd]);
    });

    // 2. NUEVA RUTA MAGICA: Descargar Reporte PDF (Agenda del Día)
   Route::get('/citas/reporte/pdf', function () {
        $hoy = \Carbon\Carbon::now('America/Mexico_City')->toDateString();
        
        $citas = \Illuminate\Support\Facades\DB::table('appointments')
                    ->whereDate('appointment_date', $hoy)
                    ->orderBy('appointment_time', 'asc')
                    ->get();

        // Apuntamos correctamente a la carpeta layouts.plantilla_pdf
        $pdf = \PDF::loadView('layouts.plantilla_pdf', compact('citas'));
        return $pdf->download('reporte-citas-' . $hoy . '.pdf');
    });

    // 3. Pantalla del formulario de nueva cita manual
    Route::get('/citas/crear', function () {
        return view('citas_crear');
    });

    // Ruta POST para guardar la nueva cita desde la web
    Route::post('/citas', function (\Illuminate\Http\Request $request) {
        
        // Insertamos directamente en la tabla 'appointments' con los nombres en inglés
        \Illuminate\Support\Facades\DB::table('appointments')->insert([
            'user_id'            => $request->input('usuario_id') ?? 1, // O el ID del usuario actual
            'appointment_date'   => $request->input('fecha'),
            'appointment_time'   => $request->input('hora'),
            'specialty'          => $request->input('especialidad'),
            'reason'             => $request->input('notas'),
            'status'             => 'approved', // o 'pending' según prefieras
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        return redirect('/citas')->with('success', '¡Cita creada correctamente!');
    });

    // 5. Cambiar estado de la cita (Confirmar / Cancelar)
    Route::put('/citas/{id}/estado', function (Request $request, $id) {
        $cita = Cita::find($id);
        if ($cita) {
            $cita->estado = $request->input('estado');
            $cita->save();
            
            // Evaluamos qué mensaje mostrar dependiendo del estado
            $mensaje = $cita->estado == 'confirmada' ? 'La cita ha sido confirmada.' : 'La cita fue cancelada correctamente.';
            return redirect('/citas')->with('success', $mensaje);
        }
        return redirect('/citas');
    });

    // ==========================================
    // NUEVAS RUTAS: SUBIR VIDEOS LOCALES
    // ==========================================
    Route::get('/ejercicios/crear', function () {
        if(session('rol') == 'recepcionista') abort(403, 'Solo los médicos pueden subir terapias.');
        return view('ejercicios_crear');
    });

    Route::post('/ejercicios', function (Request $request) {
        if(session('rol') == 'recepcionista') abort(403);
        
        $ejercicio = new \App\Models\Ejercicio();
        $ejercicio->titulo = $request->input('titulo');
        $ejercicio->descripcion = $request->input('descripcion');
        $ejercicio->lesion_recomendada = $request->input('zona');
        $ejercicio->dificultad = $request->input('nivel');
        $ejercicio->duracion = $request->input('tiempo');
        $ejercicio->repeticiones = $request->input('reps');

        // MAGIA PARA GUARDAR EL VIDEO LOCAL
        if ($request->hasFile('video')) {
            // Guarda el video en storage/app/public/videos_ejercicios
            $path = $request->file('video')->store('videos_ejercicios', 'public');
            // Reutilizamos la columna imagen_url de tu BD para guardar la ruta del video sin romper nada
            $ejercicio->imagen_url = $path; 
        }

        $ejercicio->save();

        return redirect('/ejercicios')->with('success', '¡Video subido y guardado exitosamente en el servidor!');
    });
    
});
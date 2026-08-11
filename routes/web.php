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
        // Candado extra: Si entra la recepcionista, la rebotamos
        if(session('rol') == 'recepcionista') {
            abort(403, 'El Dashboard de métricas es exclusivo para los Médicos Titulares.');
        }

        // Obtenemos la fecha de hoy
        $hoy = \Carbon\Carbon::now('America/Mexico_City')->toDateString();
        
        // CORRECCIÓN: Usar las columnas de la nueva tabla 'appointments'
        $citasHoy = Cita::whereDate('appointment_date', $hoy)->count();
        $pendientes = Cita::where('status', 'pending')->count();
        $confirmadas = Cita::where('status', 'approved')->count();
        $totalCitas = Cita::count();

        // Mandamos esos números a la nueva pantalla
        return view('dashboard', [
            'citasHoy' => $citasHoy,
            'pendientes' => $pendientes,
            'confirmadas' => $confirmadas,
            'totalCitas' => $totalCitas
        ]);
    });

    // 1. Pantalla principal de citas
    Route::get('/citas', function () {
        // CORRECCIÓN: Ordenar por 'appointment_date'
        $citas_bd = Cita::orderBy('appointment_date', 'asc')->get();
        return view('citas', ['citas' => $citas_bd]);
    });

    // 2. NUEVA RUTA MAGICA: Descargar Reporte PDF (Agenda del Día)
    Route::get('/citas/reporte/pdf', function () {
        // 1. Obtenemos la fecha exacta de hoy en México
        $hoy = \Carbon\Carbon::now('America/Mexico_City')->toDateString();

        // 2. Filtramos MySQL para que SOLO traiga las citas de hoy, ordenadas por hora
        // CORRECCIÓN: Usar 'appointment_date' y 'appointment_time'
        $citas_bd = Cita::whereDate('appointment_date', $hoy)->orderBy('appointment_time', 'asc')->get();
        
        // 3. Cargamos la vista de HTML y la convertimos a PDF
        $pdf = Pdf::loadView('reporte_citas', ['citas' => $citas_bd]);
        
        // 4. Forzamos la descarga del archivo en el navegador
        return $pdf->download('Agenda_Del_Dia_FisioWeb.pdf');
    });

    // 3. Pantalla del formulario de nueva cita manual
    Route::get('/citas/crear', function () {
        return view('citas_crear');
    });

    // 4. Guardar la cita del formulario
    Route::post('/citas', function (Request $request) {
        $cita = new Cita();
        // CORRECCIÓN: Adaptamos al nuevo esquema de la base de datos
        // Como estamos simulando desde la web, usamos el paciente de prueba (ID 8 es Ian en la BD)
        $cita->user_id = 8; 
        $cita->physiotherapist_id = 2; // Asignamos al Dr. Carlos por defecto
        
        // Usamos los inputs en español del formulario, pero los guardamos en las columnas en inglés
        $cita->appointment_date = $request->input('fecha');
        $cita->appointment_time = $request->input('hora');
        $cita->specialty = $request->input('especialidad');
        $cita->notes = $request->input('notas');
        $cita->status = 'approved'; // Guardamos como 'approved' (confirmada)
        $cita->save();

        // Agregamos el mensaje de éxito
        return redirect('/citas')->with('success', '¡Nueva cita agendada con éxito!');
    });

    // 5. Cambiar estado de la cita (Confirmar / Cancelar)
    Route::put('/citas/{id}/estado', function (Request $request, $id) {
        $cita = Cita::find($id);
        if ($cita) {
            // CORRECCIÓN: Mapeamos el estado de español a inglés
            $estadoFrontend = $request->input('estado'); // Viene como 'confirmada' o 'cancelada'
            $nuevoEstado = $estadoFrontend == 'confirmada' ? 'approved' : 'rejected';
            
            $cita->status = $nuevoEstado;
            $cita->save();
            
            // Evaluamos qué mensaje mostrar dependiendo del estado
            $mensaje = $cita->status == 'approved' ? 'La cita ha sido confirmada.' : 'La cita fue cancelada correctamente.';
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
        // CORRECCIÓN PARA LA TABLA EXERCISES DE LA NUEVA BD
        $ejercicio->title = $request->input('titulo');
        $ejercicio->description = $request->input('descripcion');
        $ejercicio->body_zone = $request->input('zona');
        $ejercicio->level = $request->input('nivel');
        $ejercicio->duration_minutes = $request->input('tiempo');
        $ejercicio->repetitions = $request->input('reps');

        // MAGIA PARA GUARDAR EL VIDEO LOCAL
        if ($request->hasFile('video')) {
            // Guarda el video en storage/app/public/videos_ejercicios
            $path = $request->file('video')->store('videos_ejercicios', 'public');
            // Reutilizamos la columna image_url para guardar la ruta del video 
            $ejercicio->image_url = $path; 
        }

        $ejercicio->save();

        return redirect('/ejercicios')->with('success', '¡Video subido y guardado exitosamente en el servidor!');
    });
    
});
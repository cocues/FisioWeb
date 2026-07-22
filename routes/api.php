<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ejercicio;
use App\Models\Cita;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// ==========================================
// RUTAS PÚBLICAS (Sin contraseña)
// ==========================================

// Obtener catálogo de ejercicios
Route::get('/ejercicios', function () {
    return response()->json(Ejercicio::all());
});

// ==========================================
// LOGIN CON GOOGLE (Requisito del profesor)
// ==========================================
Route::post('/login/google', function (Request $request) {
    // 1. Validamos que el celular nos mande el correo y nombre
    $request->validate([
        'email' => 'required|email',
        'name' => 'required|string',
    ]);

    // 2. Buscamos si el usuario ya existe en nuestra Base de Datos MySQL
    $user = User::where('email', $request->email)->first();

    // 3. Si NO existe, lo registramos como nuevo paciente automáticamente
    if (!$user) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // Le ponemos una contraseña aleatoria súper segura porque se logueó con Google
        $user->password = Hash::make(Str::random(24)); 
        $user->save();
    }

    // 4. Generamos el Token de seguridad (La "llave" del hotel)
    $token = $user->createToken('FisioWeb_MobileApp')->plainTextToken;

    // 5. Le respondemos al celular de tu compañero
    return response()->json([
        'mensaje' => 'Login exitoso',
        'usuario' => $user,
        'token' => $token
    ], 200);
});

// ==========================================
// CRUD PARA LA APP MÓVIL - TABLA CITAS
// ==========================================

Route::get('/citas', function () {
    return response()->json(Cita::all());
});

Route::post('/citas', function (Request $request) {
    $cita = new Cita();
    $cita->usuario_id = $request->input('usuario_id', 1);
    $cita->fecha = $request->input('fecha');
    $cita->hora = $request->input('hora');
    $cita->especialidad = $request->input('especialidad');
    $cita->notas = $request->input('notas', '');
    $cita->estado = 'pendiente';
    $cita->save();

    return response()->json(['mensaje' => 'Cita agendada', 'cita' => $cita], 201);
});

Route::put('/citas/{id}', function (Request $request, $id) {
    $cita = Cita::find($id);
    if (!$cita) return response()->json(['mensaje' => 'Cita no encontrada'], 404);

    $cita->estado = $request->input('estado', $cita->estado);
    $cita->save();
    return response()->json(['mensaje' => 'Cita actualizada', 'cita' => $cita]);
});

Route::delete('/citas/{id}', function ($id) {
    $cita = Cita::find($id);
    if ($cita) {
        $cita->delete();
        return response()->json(['mensaje' => 'Cita eliminada']);
    }
    return response()->json(['mensaje' => 'No se encontró'], 404);
});
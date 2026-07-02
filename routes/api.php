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
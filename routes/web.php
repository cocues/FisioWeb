<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/ejercicios', function () {
    return view('ejercicios');
});

Route::get('/cuestionario', function () {
    return view('cuestionario');
});

Route::get('/progreso', function (){
    return view('progreso');
});
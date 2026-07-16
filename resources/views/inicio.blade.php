@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 md:py-20 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <!-- Textos lado izquierdo -->
    <div>
        <div class="inline-flex items-center gap-2 bg-green-50 text-fisiogreen text-xs font-semibold px-3 py-1 rounded-full mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-fisiogreen"></span>
            Plataforma web de fisioterapia - UTJ 2026
        </div>
        
        <h1 class="text-5xl md:text-6xl font-serif text-fisiogreen font-normal leading-[1.1] tracking-tight mb-6">
            Tu guía digital <br>
            hacia una <br>
            recuperación <br>
            real.
        </h1>
        
        <p class="text-gray-500 text-lg mb-8 max-w-md leading-relaxed">
            FisioWeb reúne ejercicios terapéuticos, cuestionarios de síntomas, seguimiento de progreso y contenido educativo en una sola plataforma accesible para pacientes, estudiantes y profesionales.
        </p>
        
        <div class="flex flex-wrap items-center gap-4">
            <a href="/cuestionario" class="bg-fisiogreen text-white px-6 py-3 rounded-full font-medium hover:bg-emerald-900 transition flex items-center gap-2">
                Hacer cuestionario de síntomas
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            <a href="/ejercicios" class="bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:border-fisiogreen hover:text-fisiogreen transition">
                Ver ejercicios
            </a>
        </div>
    </div>

    <!-- Imagen lado derecho -->
    <div class="relative w-full h-[500px] rounded-2xl overflow-hidden shadow-xl">
        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Fisioterapeuta atendiendo a paciente" class="w-full h-full object-cover">
        
        <div class="absolute bottom-6 right-6 bg-white p-4 rounded-xl shadow-lg w-48">
            <p class="text-xs text-gray-500 mb-1">Tu progreso esta semana</p>
            <div class="flex items-end gap-2">
                <span class="text-2xl font-bold text-fisiogreen">87%</span>
                <svg class="w-5 h-5 text-green-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
        </div>
    </div>
</div>
@endsection
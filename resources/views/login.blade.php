@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16 flex flex-col items-center justify-center min-h-[70vh]">
    
    <div class="text-center mb-10">
        <h1 class="text-3xl font-serif text-gray-900 font-bold mb-3">Portal de Acceso</h1>
        <p class="text-gray-500">Selecciona tu perfil para ingresar a la plataforma (Simulación).</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-2xl">
        
        <!-- Tarjeta de Paciente -->
        <a href="/simular-login/paciente" class="group bg-white border border-gray-200 rounded-3xl p-8 hover:border-blue-500 hover:shadow-xl transition-all duration-300 text-center flex flex-col items-center">
            <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center text-blue-500 mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-2">Soy Paciente</h2>
            <p class="text-sm text-gray-500">Ver mis ejercicios, registrar mi progreso y contestar mis cuestionarios.</p>
        </a>

        <!-- Tarjeta de Doctor -->
        <a href="/simular-login/doctor" class="group bg-white border border-gray-200 rounded-3xl p-8 hover:border-fisiogreen hover:shadow-xl transition-all duration-300 text-center flex flex-col items-center">
            <div class="w-20 h-20 bg-green-50 rounded-full flex items-center justify-center text-fisiogreen mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-2">Soy Fisioterapeuta</h2>
            <p class="text-sm text-gray-500">Administrar mis pacientes, confirmar citas y revisar el dashboard.</p>
        </a>

    </div>
</div>
@endsection
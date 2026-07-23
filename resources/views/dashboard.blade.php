@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Encabezado del Dashboard -->
    <div class="mb-8">
        <span class="text-xs font-bold tracking-widest uppercase text-teal-600 mb-1 block">Bienvenido de vuelta</span>
        <h1 class="text-3xl font-serif text-gray-900 font-bold">Resumen de la Clínica</h1>
        <p class="text-sm text-gray-500 mt-1">Aquí tienes las estadísticas en tiempo real de FisioWeb MX.</p>
    </div>

    <!-- Grid de Tarjetas (KPIs) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- Tarjeta 1: Citas de Hoy -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-500">Citas para Hoy</h3>
                <div class="w-10 h-10 rounded-full bg-teal-50 flex items-center justify-center text-teal-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <div>
                <p class="text-4xl font-serif font-bold text-gray-900">{{ $citasHoy }}</p>
                <p class="text-xs text-teal-600 mt-1 font-medium">Pacientes agendados</p>
            </div>
        </div>

        <!-- Tarjeta 2: Pendientes -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-500">Por Confirmar</h3>
                <div class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center text-orange-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div>
                <p class="text-4xl font-serif font-bold text-gray-900">{{ $pendientes }}</p>
                <p class="text-xs text-orange-500 mt-1 font-medium">Requieren tu atención</p>
            </div>
        </div>

        <!-- Tarjeta 3: Confirmadas -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-500">Confirmadas (Total)</h3>
                <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div>
                <p class="text-4xl font-serif font-bold text-gray-900">{{ $confirmadas }}</p>
                <p class="text-xs text-green-600 mt-1 font-medium">Listas para recibir</p>
            </div>
        </div>

        <!-- Tarjeta 4: Total Histórico -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-500">Total Histórico</h3>
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
            <div>
                <p class="text-4xl font-serif font-bold text-gray-900">{{ $totalCitas }}</p>
                <p class="text-xs text-blue-500 mt-1 font-medium">Citas en la base de datos</p>
            </div>
        </div>

    </div>

    <!-- Botón de Acción -->
    <div class="flex justify-center mt-10">
        <a href="/citas" class="bg-fisiogreen hover:bg-teal-900 text-white font-medium px-8 py-3 rounded-full transition-colors shadow-lg flex items-center gap-2">
            Ver todas las citas
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>

</div>
@endsection
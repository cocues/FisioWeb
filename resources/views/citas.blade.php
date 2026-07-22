@extends('layouts.app')

@section('title', 'Gestión de Citas')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Encabezado del Panel -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <span class="text-xs font-bold tracking-widest uppercase text-teal-600 mb-1 block">Panel Administrativo</span>
            <h1 class="text-3xl font-serif text-gray-900 font-bold">Gestión de Citas</h1>
            <p class="text-sm text-gray-500 mt-1">Administra las solicitudes de tus pacientes agendadas desde la app móvil.</p>
        </div>
        <button class="bg-fisiogreen hover:bg-teal-900 text-white font-medium px-5 py-2.5 rounded-xl transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Nueva Cita Manual
        </button>
    </div>

    <!-- Tabla Principal de Citas -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Próximas Citas (En vivo)</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-white border-b border-gray-100 text-gray-500">
                    <tr>
                        <th class="px-6 py-4 font-medium">ID Paciente</th>
                        <th class="px-6 py-4 font-medium">Fecha y Hora</th>
                        <th class="px-6 py-4 font-medium">Especialidad</th>
                        <th class="px-6 py-4 font-medium">Estado</th>
                        <th class="px-6 py-4 font-medium text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <!-- Bucle Dinámico: Laravel dibujará una fila por cada cita en la BD -->
                    @forelse($citas as $cita)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Usuario #{{ $cita->usuario_id ?? 'N/A' }}</p>
                                    <p class="text-xs text-gray-400">Desde App Móvil</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-800">{{ $cita->fecha }}</p>
                            <p class="text-xs text-gray-500">{{ $cita->hora }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $cita->especialidad }}</td>
                        <td class="px-6 py-4">
                            @if($cita->estado == 'pendiente')
                                <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 border border-orange-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span> Pendiente
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> {{ ucfirst($cita->estado) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-sm font-medium text-fisiogreen hover:underline px-2 py-1">Ver detalles</button>
                        </td>
                    </tr>
                    @empty
                    <!-- Si la base de datos está vacía, mostramos este mensaje -->
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-lg font-medium text-gray-900">Aún no hay citas</p>
                            <p class="text-sm text-gray-500">Las citas agendadas desde la app móvil de tu compañero aparecerán aquí.</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
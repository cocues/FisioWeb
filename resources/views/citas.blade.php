@extends('layouts.app')

@section('title', 'Gestión de Citas')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Encabezado del Panel -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 animate-[fadeIn_0.3s_ease-out]">
        <div>
            <span class="text-xs font-bold tracking-widest uppercase text-teal-600 mb-1 block">Panel Administrativo</span>
            <h1 class="text-3xl font-serif text-gray-900 font-bold">Gestión de Citas</h1>
            <p class="text-sm text-gray-500 mt-1">Administra las solicitudes de tus pacientes agendadas desde la app móvil.</p>
        </div>
        <button class="bg-[#1a473b] hover:bg-teal-900 text-white font-medium px-5 py-2.5 rounded-xl transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Nueva Cita Manual
        </button>
    </div>

    <!-- Tarjetas de Resumen (KPIs) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-[slideIn_0.4s_ease-out]">
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Citas para Hoy</p>
                <p class="text-2xl font-bold text-gray-900">5</p>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Pendientes de Confirmar</p>
                <p class="text-2xl font-bold text-gray-900">3</p>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Completadas esta semana</p>
                <p class="text-2xl font-bold text-gray-900">18</p>
            </div>
        </div>
    </div>

    <!-- Tabla Principal de Citas -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden animate-[slideIn_0.5s_ease-out]">
        <!-- Cabecera de la tabla -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-lg font-semibold text-gray-800">Próximas Citas</h2>
            <div class="flex gap-2">
                <button class="text-sm text-gray-500 hover:text-gray-900 px-3 py-1 bg-white border border-gray-200 rounded-lg shadow-sm transition">Todas</button>
                <button class="text-sm text-[#1a473b] font-medium px-3 py-1 bg-[#e8f3f0] border border-[#1a473b]/20 rounded-lg shadow-sm transition">Pendientes</button>
            </div>
        </div>
        
        <!-- Contenedor Responsive para la tabla -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-white border-b border-gray-100 text-gray-500">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium">Paciente</th>
                        <th scope="col" class="px-6 py-4 font-medium">Fecha y Hora</th>
                        <th scope="col" class="px-6 py-4 font-medium">Especialidad</th>
                        <th scope="col" class="px-6 py-4 font-medium">Estado</th>
                        <th scope="col" class="px-6 py-4 font-medium text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <!-- Fila 1: Cita Pendiente -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">MR</div>
                                <div>
                                    <p class="font-medium text-gray-900">María Rodríguez</p>
                                    <p class="text-xs text-gray-400">Agendado en App Móvil</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-800">Hoy</p>
                            <p class="text-xs text-gray-500">10:00 AM</p>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Terapia Física</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 border border-orange-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span> Pendiente
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition-colors" title="Confirmar Cita">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </button>
                                <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Cancelar Cita">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Fila 2: Cita Confirmada -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">JG</div>
                                <div>
                                    <p class="font-medium text-gray-900">Juan Gómez</p>
                                    <p class="text-xs text-gray-400">Presencial</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-800">Mañana</p>
                            <p class="text-xs text-gray-500">11:30 AM</p>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Rehabilitación Deportiva</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Confirmada
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-sm font-medium text-[#1a473b] hover:underline px-2 py-1">Ver detalles</button>
                        </td>
                    </tr>

                    <!-- Fila 3: Cita Cancelada -->
                    <tr class="hover:bg-gray-50 transition-colors opacity-75">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">AL</div>
                                <div>
                                    <p class="font-medium text-gray-900">Ana López</p>
                                    <p class="text-xs text-gray-400">Agendado en App Móvil</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-800">20 Jul 2026</p>
                            <p class="text-xs text-gray-500">09:00 AM</p>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Terapia Física</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Cancelada
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-sm font-medium text-gray-400 cursor-not-allowed px-2 py-1">Sin acciones</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Paginación -->
        <div class="px-6 py-4 border-t border-gray-100 bg-white flex justify-between items-center text-sm text-gray-500">
            <span>Mostrando 3 de 12 citas</span>
            <div class="flex gap-1">
                <button class="px-3 py-1.5 border border-gray-200 rounded-lg hover:bg-gray-50 disabled:opacity-50 transition" disabled>Anterior</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Siguiente</button>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endsection
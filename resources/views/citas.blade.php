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
        
        <!-- Aquí agregamos los dos botones juntos -->
        <div class="flex gap-3">
            <!-- BOTÓN MAGICO DE PDF -->
            <a href="/citas/reporte/pdf" class="bg-gray-100 hover:bg-gray-200 text-gray-700 border border-gray-300 font-medium px-4 py-2.5 rounded-xl transition-colors shadow-sm flex items-center gap-2 text-sm">
                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9h2v9h-2z"/></svg>
                Exportar PDF
            </a>

            <!-- BOTÓN ORIGINAL -->
            <a href="/citas/crear" class="bg-fisiogreen hover:bg-teal-900 text-white font-medium px-5 py-2.5 rounded-xl transition-colors shadow-sm flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Nueva Cita Manual
            </a>
        </div>
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
                        <th class="px-6 py-4 font-medium">Paciente</th>
                        <th class="px-6 py-4 font-medium">Fecha y Hora</th>
                        <th class="px-6 py-4 font-medium">Especialidad</th>
                        <th class="px-6 py-4 font-medium">Estado</th>
                        <th class="px-6 py-4 font-medium text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    @forelse($citas as $cita)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $cita->paciente ? $cita->paciente->name : 'Usuario #'.$cita->user_id }}</p>
                                    <p class="text-xs text-gray-400">{{ $cita->patient_email ?? 'Desde App Móvil' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-800">{{ $cita->appointment_date }}</p>
                            <p class="text-xs text-gray-500">{{ $cita->appointment_time }} hrs</p>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $cita->specialty }}</td>
                        <td class="px-6 py-4">
                            @if($cita->status == 'pending')
                                <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 border border-orange-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span> Pendiente
                                </span>
                            @elseif($cita->status == 'rejected' || $cita->status == 'cancelled')
                                <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Rechazada
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> {{ $cita->status == 'approved' ? 'Confirmada' : ucfirst($cita->status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end gap-2">
                            @if($cita->status == 'pending')
                                <!-- Botón Confirmar -->
                                <form action="/citas/{{ $cita->id }}/estado" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="estado" value="confirmada">
                                    <button type="submit" class="text-xs font-medium text-white bg-fisiogreen hover:bg-teal-900 px-3 py-1.5 rounded-lg transition-colors shadow-sm">Confirmar</button>
                                </form>
                                
                                <!-- Botón Cancelar -->
                                <form action="/citas/{{ $cita->id }}/estado" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="estado" value="cancelada">
                                    <button type="submit" class="text-xs font-medium text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg transition-colors shadow-sm">Rechazar</button>
                                </form>
                            @else
                                <button class="text-xs font-medium text-gray-400 bg-gray-100 px-3 py-1.5 rounded-lg cursor-not-allowed">Resuelta</button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <!-- Si la base de datos está vacía, mostramos este mensaje -->
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-lg font-medium text-gray-900">Aún no hay citas</p>
                            <p class="text-sm text-gray-500">Las citas agendadas desde la app móvil o la web aparecerán aquí.</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
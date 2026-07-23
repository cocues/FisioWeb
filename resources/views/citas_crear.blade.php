@extends('layouts.app')

@section('title', 'Nueva Cita Manual')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Botón Regresar -->
    <a href="/citas" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-fisiogreen mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Regresar a Citas
    </a>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
            <h2 class="text-xl font-serif text-gray-900 font-bold">Agendar Nueva Cita</h2>
            <p class="text-sm text-gray-500">Ingresa los datos del paciente que llamó por teléfono o acudió a recepción.</p>
        </div>

        <!-- FORMULARIO -->
        <form action="/citas" method="POST" class="p-6">
            @csrf <!-- Escudo de Seguridad de Laravel -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Fecha -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Fecha de la Cita</label>
                    <input type="date" name="fecha" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-fisiogreen focus:border-fisiogreen text-gray-700">
                </div>

                <!-- Hora -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hora de la Cita</label>
                    <input type="time" name="hora" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-fisiogreen focus:border-fisiogreen text-gray-700">
                </div>

                <!-- Especialidad -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Especialidad / Terapia</label>
                    <select name="especialidad" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-fisiogreen focus:border-fisiogreen text-gray-700 bg-white">
                        <option value="Fisioterapia Deportiva">Fisioterapia Deportiva</option>
                        <option value="Rehabilitación Post-operatoria">Rehabilitación Post-operatoria</option>
                        <option value="Terapia de Espalda">Terapia de Espalda</option>
                        <option value="Terapia de Rodilla">Terapia de Rodilla</option>
                        <option value="Valoración Inicial">Valoración Inicial</option>
                    </select>
                </div>

                <!-- Notas -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Notas Adicionales</label>
                    <textarea name="notas" rows="3" placeholder="Ej. El paciente tiene mucho dolor al caminar..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-fisiogreen focus:border-fisiogreen text-gray-700"></textarea>
                </div>
            </div>

            <!-- Botones Guardar -->
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="/citas" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">Cancelar</a>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-fisiogreen rounded-xl hover:bg-teal-900 transition-colors shadow-sm">Guardar Cita</button>
            </div>
        </form>

    </div>
</div>
@endsection
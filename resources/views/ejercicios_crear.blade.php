@extends('layouts.app')

@section('title', 'Subir Nuevo Ejercicio')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <div class="mb-8">
        <a href="/ejercicios" class="text-sm text-fisiogreen hover:underline flex items-center gap-1 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Volver a la biblioteca
        </a>
        <h1 class="text-3xl font-serif text-gray-900 font-bold">Subir Nuevo Video</h1>
        <p class="text-sm text-gray-500 mt-1">Añade un ejercicio grabado por ti al catálogo de la clínica.</p>
    </div>

    <!-- IMPORTANTE: El enctype="multipart/form-data" es obligatorio para subir archivos -->
    <form action="/ejercicios" method="POST" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Título -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Título del Ejercicio</label>
                <input type="text" name="titulo" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:border-fisiogreen bg-gray-50" placeholder="Ej. Elevación lateral con mancuerna">
            </div>

            <!-- Zona y Nivel -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Zona Corporal</label>
                <select name="zona" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:border-fisiogreen bg-gray-50">
                    <option value="Espalda">Espalda</option>
                    <option value="Hombro">Hombro</option>
                    <option value="Cadera">Cadera</option>
                    <option value="Cuello">Cuello / Cervicales</option>
                    <option value="Tobillo">Tobillo</option>
                    <option value="Rodilla">Rodilla</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nivel de Dificultad</label>
                <select name="nivel" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:border-fisiogreen bg-gray-50">
                    <option value="Básico">Básico</option>
                    <option value="Intermedio">Intermedio</option>
                    <option value="Avanzado">Avanzado</option>
                </select>
            </div>

            <!-- Tiempo y Repeticiones -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tiempo estimado</label>
                <input type="text" name="tiempo" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:border-fisiogreen bg-gray-50" placeholder="Ej. 10 min">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Repeticiones / Series</label>
                <input type="text" name="reps" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:border-fisiogreen bg-gray-50" placeholder="Ej. 3 × 12 rep">
            </div>

            <!-- Descripción -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Descripción clínica</label>
                <textarea name="descripcion" rows="3" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:border-fisiogreen bg-gray-50" placeholder="Explica cómo realizar el movimiento y sus beneficios..."></textarea>
            </div>

            <!-- ARCHIVO DE VIDEO -->
            <div class="md:col-span-2 p-6 border-2 border-dashed border-gray-300 rounded-2xl text-center bg-gray-50 hover:bg-gray-100 transition-colors">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <label class="block text-sm font-medium text-gray-900 mb-2">Selecciona un archivo de Video (MP4)</label>
                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-fisiogreen hover:file:bg-green-100 cursor-pointer">
            </div>
        </div>

        <button type="submit" class="w-full bg-fisiogreen hover:bg-teal-900 text-white font-medium py-3 rounded-xl transition-colors shadow-md flex justify-center items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            Subir Video a la Plataforma
        </button>
    </form>
</div>
@endsection
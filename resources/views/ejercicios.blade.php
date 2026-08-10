@extends('layouts.app')

@section('title', 'Ejercicios')

@section('content')

@php
// =========================================================
// CATÁLOGO COMPLETO DE 18 EJERCICIOS (Con IDs extraídos)
// =========================================================
$lista_ejercicios = [
    // ESPALDA
    ['titulo' => 'Cat-Cow (Gato-Vaca)', 'desc' => 'Mejora la movilidad y flexibilidad de la columna vertebral baja y torácica.', 'youtube_id' => 'BWxZLqWKtGE', 'zona' => 'Espalda', 'nivel' => 'Básico', 'tiempo' => '5 min', 'reps' => '3 × 10 rep'],
    ['titulo' => 'Enhebrar la aguja', 'desc' => 'Estiramiento profundo para liberar la tensión en la zona torácica y hombros.', 'youtube_id' => '0PI_GOIGTvA', 'zona' => 'Espalda', 'nivel' => 'Intermedio', 'tiempo' => '8 min', 'reps' => '3 × 10 rep'],
    ['titulo' => 'Jefferson Curl', 'desc' => 'Fortalece y estira la cadena posterior. Realizar con peso ligero y control.', 'youtube_id' => 'zoyE8-vaKeE', 'zona' => 'Espalda', 'nivel' => 'Avanzado', 'tiempo' => '10 min', 'reps' => '4 × 8 rep'],
    
    // HOMBRO
    ['titulo' => 'Rotación Externa con Banda', 'desc' => 'Fortalece el manguito rotador y previene lesiones articulares. Mantén el codo pegado.', 'youtube_id' => 'iNn_sNA6TbU', 'zona' => 'Hombro', 'nivel' => 'Básico', 'tiempo' => '5 min', 'reps' => '3 × 15 rep'],
    ['titulo' => 'Serie Y-T-W (Banco Inclinado)', 'desc' => 'Mejora la estabilidad escapular y la postura general de los hombros.', 'youtube_id' => 'itvKYjCRZK0', 'zona' => 'Hombro', 'nivel' => 'Intermedio', 'tiempo' => '10 min', 'reps' => '3 × 12 rep'],
    ['titulo' => 'Face Pull Isométrico', 'desc' => 'Trabajo intenso para los deltoides posteriores y trapecios. Sostén la contracción.', 'youtube_id' => 'JWGLMIvvDvM', 'zona' => 'Hombro', 'nivel' => 'Avanzado', 'tiempo' => '8 min', 'reps' => '4 × 10 rep'],

        ['titulo' => 'Sentadilla Española', 'desc' => 'Fortalecimiento isométrico pesado, ideal para tendinopatías rotulianas severas.', 'youtube_id' => '9GE1LxLKXP4', 'zona' => 'Rodilla', 'nivel' => 'Avanzado', 'tiempo' => '12 min', 'reps' => '4 × 30s'],
    ];

    // =========================================================
    // UNIR VIDEOS SUBIDOS POR EL DOCTOR (DESDE LA BASE DE DATOS)
    // =========================================================
    if(isset($ejercicios_db)) {
        foreach($ejercicios_db as $ej) {
            $lista_ejercicios[] = [
                'titulo' => $ej->titulo,
                'desc' => $ej->descripcion,
                'youtube_id' => null, // No es de YouTube
                'video_path' => $ej->imagen_url ?? null, // Es un video local
                'zona' => $ej->lesion_recomendada ?? 'General',
                'nivel' => $ej->dificultad ?? 'Básico',
                'tiempo' => $ej->duracion ?? '5 min',
                'reps' => $ej->repeticiones ?? '10 rep'
            ];
        }
    }
@endphp

<!-- Contenido Principal: Biblioteca de Ejercicios -->
<div class="max-w-6xl mx-auto px-6 py-10">
    <!-- Encabezado -->
    <div class="mb-8 animate-[fadeIn_0.3s_ease-out]">
        <span class="text-xs font-bold tracking-widest uppercase text-emerald-600 mb-2 block">Categorías</span>
        <div class="flex flex-wrap gap-2 items-center">
            <button onclick="filtrarEjercicios('todos', this)" class="btn-filtro px-4 py-2 rounded-xl text-xs font-medium bg-fisiogreen text-white border border-transparent transition-colors">Todos</button>
            <button onclick="filtrarEjercicios('espalda', this)" class="btn-filtro px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Espalda</button>
            <button onclick="filtrarEjercicios('hombro', this)" class="btn-filtro px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Hombro</button>
            <button onclick="filtrarEjercicios('cadera', this)" class="btn-filtro px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Cadera</button>
            <button onclick="filtrarEjercicios('cuello', this)" class="btn-filtro px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Cuello</button>
            <button onclick="filtrarEjercicios('tobillo', this)" class="btn-filtro px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Tobillo</button>
            <button onclick="filtrarEjercicios('rodilla', this)" class="btn-filtro px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Rodilla</button>
            
            <!-- BOTÓN PARA SUBIR VIDEO (SOLO DOCTORES) -->
            @if(session('rol') == 'doctor')
            <a href="/ejercicios/crear" class="ml-2 bg-fisiogreen text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-emerald-900 transition flex items-center gap-1 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                Subir Video Local
            </a>
            @endif
        </div>
    </div>

    <!-- GRID DE VIDEOS: Exactamente 2 columnas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
        
        <!-- BUCLE DE LARAVEL PARA DIBUJAR LOS VIDEOS AUTOMÁTICAMENTE -->
        @foreach($lista_ejercicios as $ejercicio)
            <div class="tarjeta-ejercicio bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col" data-zona="{{ strtolower($ejercicio['zona']) }}">
                
                <!-- Reproductor de YouTube o Local -->
                <div class="relative w-full aspect-video bg-black">
                    @if(!empty($ejercicio['youtube_id']))
                        <iframe 
                            class="w-full h-full"
                            src="https://www.youtube.com/embed/{{ $ejercicio['youtube_id'] }}" 
                            title="{{ $ejercicio['titulo'] }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                        </iframe>
                    @elseif(!empty($ejercicio['video_path']))
                        <!-- El reproductor nativo de HTML5 para videos locales -->
                        <video class="w-full h-full object-cover" controls preload="metadata">
                            <source src="{{ asset('storage/' . $ejercicio['video_path']) }}" type="video/mp4">
                            Tu navegador no soporta videos.
                        </video>
                    @endif
                </div>

                <!-- Detalles del Ejercicio -->
                <div class="p-5 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-serif text-gray-900 leading-snug">{{ $ejercicio['titulo'] }}</h3>
                    </div>
                    
                    <div class="flex gap-2 mb-3">
                        <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider {{ $ejercicio['nivel'] == 'Básico' ? 'bg-emerald-100 text-emerald-700' : ($ejercicio['nivel'] == 'Intermedio' ? 'bg-orange-100 text-orange-700' : 'bg-red-100 text-red-700') }}">
                            {{ $ejercicio['nivel'] }}
                        </span>
                        <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-gray-100 text-gray-600">
                            {{ $ejercicio['zona'] }}
                        </span>
                    </div>

                    <p class="text-sm text-gray-500 mb-6 flex-1">{{ $ejercicio['desc'] }}</p>
                    
                    <div class="flex gap-4 text-sm text-gray-600 font-medium border-t border-gray-100 pt-4 mt-auto">
                        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-fisiogreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ $ejercicio['tiempo'] }}</span>
                        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-fisiogreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> {{ $ejercicio['reps'] }}</span>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<!-- SCRIPT PARA FILTRAR EJERCICIOS INSTANTÁNEAMENTE -->
<script>
    function filtrarEjercicios(zonaSeleccionada, botonClickeado) {
        // 1. Quitarle el color verde a todos los botones y ponerlos blancos
        let botones = document.querySelectorAll('.btn-filtro');
        botones.forEach(btn => {
            btn.classList.remove('bg-fisiogreen', 'text-white', 'border-transparent');
            btn.classList.add('bg-white', 'text-gray-500', 'border-gray-200');
        });

        // 2. Ponerle el color verde (activo) al botón que el usuario clickeó
        botonClickeado.classList.remove('bg-white', 'text-gray-500', 'border-gray-200');
        botonClickeado.classList.add('bg-fisiogreen', 'text-white', 'border-transparent');

        // 3. Mostrar u ocultar las tarjetas dependiendo de la zona
        let tarjetas = document.querySelectorAll('.tarjeta-ejercicio');
        tarjetas.forEach(tarjeta => {
            let zonaTarjeta = tarjeta.getAttribute('data-zona'); // Lee si es 'espalda', 'hombro', etc.
            
            // Si el usuario eligió "todos" o si la zona de la tarjeta coincide, la mostramos
            if (zonaSeleccionada === 'todos' || zonaTarjeta.includes(zonaSeleccionada)) {
                tarjeta.style.display = 'flex';
            } else {
                tarjeta.style.display = 'none'; // La ocultamos
            }
        });
    }
</script>
@endsection
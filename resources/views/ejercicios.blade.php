<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FisioWeb MX - Ejercicios</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fisiogreen: '#1A5B4C',
                        fisiobg: '#FAFAFA'
                    },
                    fontFamily: {
                        serif: ['Georgia', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-fisiobg font-sans text-gray-800 antialiased min-h-screen pb-16">

    <!-- Navegación Superior (Igual a la de inicio) -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-fisiogreen text-white rounded flex items-center justify-center font-bold text-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <span class="text-xl font-bold text-gray-900">FisioWeb</span>
        </div>
        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-500">
            <a href="/" class="hover:text-fisiogreen transition">Inicio</a>
            <!-- Este botón ahora está marcado como activo -->
            <a href="/ejercicios" class="flex items-center gap-1 text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> Ejercicios</a>
            <a href="#" class="hover:text-fisiogreen transition">Cuestionario</a>
            <a href="#" class="hover:text-fisiogreen transition">Mi Progreso</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="#" class="text-sm font-medium text-gray-600 hover:text-fisiogreen">Iniciar sesión</a>
            <a href="#" class="bg-fisiogreen text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-emerald-900 transition">Pedir cita</a>
        </div>
    </nav>

    <!-- Contenido Principal: Biblioteca de Ejercicios -->
    <div class="max-w-6xl mx-auto px-6 py-10">
        <!-- Encabezado -->
        <div class="mb-8">
            <span class="text-xs font-bold tracking-widest uppercase text-emerald-600 mb-2 block">
                Biblioteca
            </span>
            <h1 class="text-4xl font-serif text-gray-900 mb-2">
                Ejercicios terapéuticos
            </h1>
            <p class="text-sm text-gray-500">
                Selecciona una zona corporal y encuentra el programa adecuado para tu recuperación.
            </p>
        </div>

        <!-- Filtros y Buscador -->
        <div class="flex flex-col sm:flex-row gap-4 mb-8">
            <div class="relative flex-1 max-w-sm">
                <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Buscar ejercicio..." class="w-full pl-9 pr-4 py-2.5 text-sm bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-fisiogreen transition-colors shadow-sm">
            </div>
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 rounded-xl text-xs font-medium bg-fisiogreen text-white">Todos</button>
                <button class="px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Espalda</button>
                <button class="px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Hombro</button>
                <button class="px-4 py-2 rounded-xl text-xs font-medium bg-white border border-gray-200 text-gray-500 hover:border-fisiogreen hover:text-fisiogreen transition-colors">Rodilla</button>
            </div>
        </div>

        <!-- Grid de Tarjetas (Ejercicios de prueba estáticos por ahora) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Tarjeta 1 -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow duration-300 group cursor-pointer">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1540206276207-3af25c08abc4?w=400&h=260&fit=crop&auto=format" alt="Estiramiento lumbar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <!-- Botón Play Hover -->
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-fisiogreen">
                            <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                    <!-- Etiquetas -->
                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">Básico</span>
                    <span class="absolute top-3 right-3 px-3 py-1 bg-white/90 backdrop-blur rounded-full text-xs font-medium text-gray-700">Espalda</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-serif text-gray-900 mb-2 leading-snug">Estiramiento lumbar en decúbito</h3>
                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">Reduce la tensión lumbar y mejora la movilidad de la columna baja.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 10 min</span>
                            <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> 3 × 30s</span>
                        </div>
                        <span class="flex items-center gap-1 text-xs text-fisiogreen font-bold">Ver guía <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow duration-300 group cursor-pointer">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1645005513713-9e2b92a687d3?w=400&h=260&fit=crop&auto=format" alt="Hombro" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-fisiogreen"><svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
                    </div>
                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">Básico</span>
                    <span class="absolute top-3 right-3 px-3 py-1 bg-white/90 backdrop-blur rounded-full text-xs font-medium text-gray-700">Hombro</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-serif text-gray-900 mb-2 leading-snug">Movilización pendular de Codman</h3>
                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">Recupera el rango de movimiento glenohumeral sin carga articular.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 8 min</span>
                            <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> 2 × 20 rep</span>
                        </div>
                        <span class="flex items-center gap-1 text-xs text-fisiogreen font-bold">Ver guía <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow duration-300 group cursor-pointer">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1692372372810-c848c9cca1c5?w=400&h=260&fit=crop&auto=format" alt="Rodilla" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-fisiogreen"><svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
                    </div>
                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Intermedio</span>
                    <span class="absolute top-3 right-3 px-3 py-1 bg-white/90 backdrop-blur rounded-full text-xs font-medium text-gray-700">Rodilla</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-serif text-gray-900 mb-2 leading-snug">Fortalecimiento de cuádriceps</h3>
                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">Protocolo post-lesión de LCA para estabilización dinámica de rodilla.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 15 min</span>
                            <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> 4 × 12 rep</span>
                        </div>
                        <span class="flex items-center gap-1 text-xs text-fisiogreen font-bold">Ver guía <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
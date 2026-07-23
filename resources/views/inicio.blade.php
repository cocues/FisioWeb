<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FisioWeb MX - Recuperación Real</title>
    <!-- Cargamos Tailwind CSS temporalmente por CDN para maquetar rápido -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuramos los colores exactos de tu diseño -->
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
<body class="bg-fisiobg font-sans text-gray-800 antialiased">

    <!-- Navegación Superior -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-100">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-fisiogreen text-white rounded flex items-center justify-center font-bold text-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <span class="text-xl font-bold text-gray-900">FisioWeb</span>
        </div>

        <!-- Menú Central -->
        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-500">
            <a href="#" class="flex items-center gap-1 text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> Inicio</a>
            <a href="/ejercicios" class="hover:text-fisiogreen transition">Ejercicios</a>
            <a href="/cuestionario" class="hover:text-fisiogreen transition">Cuestionario</a>
            <a href="/progreso" class="hover:text-fisiogreen transition">Mi Progreso</a>
            <a href="#" class="hover:text-fisiogreen transition">Blog</a>
            <a href="/citas" class="hover:text-fisiogreen transition">Citas</a>
            <a href="#" class="hover:text-fisiogreen transition">FAQ</a>
        </div>

        <!-- Botones Derecha -->
        <div class="flex items-center gap-4">
            <button class="text-gray-400 hover:text-fisiogreen">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </button>
            <a href="#" class="text-sm font-medium text-gray-600 hover:text-fisiogreen">Iniciar sesión</a>
            <a href="#" class="bg-fisiogreen text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-emerald-900 transition">Pedir cita</a>
        </div>
    </nav>

    <!-- Contenido Principal (Hero Section) -->
    <main class="max-w-7xl mx-auto px-6 py-12 md:py-20 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        
        <!-- Textos lado izquierdo -->
        <div>
            <div class="inline-flex items-center gap-2 bg-green-50 text-fisiogreen text-xs font-semibold px-3 py-1 rounded-full mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-fisiogreen"></span>
                Plataforma web de fisioterapia - UTJ 2025
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
                <a href="#" class="bg-fisiogreen text-white px-6 py-3 rounded-full font-medium hover:bg-emerald-900 transition flex items-center gap-2">
                    Hacer cuestionario de síntomas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="#" class="bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:border-fisiogreen hover:text-fisiogreen transition">
                    Ver ejercicios
                </a>
            </div>
        </div>

        <!-- Imagen lado derecho -->
        <div class="relative w-full h-[500px] rounded-2xl overflow-hidden shadow-xl">
            <!-- Usamos una imagen de Unsplash libre de derechos parecida a tu diseño -->
            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Fisioterapeuta atendiendo a paciente" class="w-full h-full object-cover">
            
            <!-- Tarjeta flotante simulada -->
            <div class="absolute bottom-6 right-6 bg-white p-4 rounded-xl shadow-lg w-48">
                <p class="text-xs text-gray-500 mb-1">Tu progreso esta semana</p>
                <div class="flex items-end gap-2">
                    <span class="text-2xl font-bold text-fisiogreen">87%</span>
                    <svg class="w-5 h-5 text-green-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
            </div>
        </div>

    </main>

</body>
</html>
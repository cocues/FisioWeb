<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FisioWeb MX - @yield('title', 'Recuperación Real')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { fisiogreen: '#1A5B4C', fisiobg: '#FAFAFA' },
                    fontFamily: { serif: ['Georgia', 'serif'], sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="bg-fisiobg font-sans text-gray-800 antialiased min-h-screen flex flex-col">

    <!-- NAVEGACIÓN MAESTRA -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-fisiogreen text-white rounded flex items-center justify-center font-bold text-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <span class="text-xl font-bold text-gray-900">FisioWeb</span>
        </div>

        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-500">
            <a href="/" class="hover:text-fisiogreen transition {{ request()->is('/') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Inicio</a>
            <a href="/ejercicios" class="hover:text-fisiogreen transition {{ request()->is('ejercicios') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Ejercicios</a>
            <a href="/cuestionario" class="hover:text-fisiogreen transition {{ request()->is('cuestionario') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Cuestionario</a>
            <a href="/progreso" class="hover:text-fisiogreen transition {{ request()->is('progreso') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Mi Progreso</a>
            <a href="/citas" class="hover:text-fisiogreen transition {{ request()->is('citas') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Citas</a>
        </div>

        <div class="flex items-center gap-4">
            <a href="#" class="text-sm font-medium text-gray-600 hover:text-fisiogreen">Iniciar sesión</a>
            <!-- Botón Pedir Cita ARREGLADO (ahora es un enlace <a>) -->
            <a href="/citas" class="bg-fisiogreen text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-emerald-900 transition">Pedir cita</a>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="flex-grow">
        @yield('content')
    </main>

</body>
</html>
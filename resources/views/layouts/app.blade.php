<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Usamos la directiva yield para que cada página ponga su propio título -->
    <title>FisioWeb MX - @yield('title', 'Recuperación Real')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { fisiogreen: '#1A5B4C', fisiobg: '#FAFAFA' },
                    fontFamily: { serif: ['Georgia', 'serif'], sans: ['Inter', 'sans-serif'], }
                }
            }
        }
    </script>
</head>
<body class="bg-fisiobg font-sans text-gray-800 antialiased min-h-screen flex flex-col">

    <!-- Navegación Superior Global -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-fisiogreen text-white rounded flex items-center justify-center font-bold text-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <span class="text-xl font-bold text-gray-900">FisioWeb</span>
        </div>

        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-500">
            <a href="/" class="hover:text-fisiogreen transition {{ request()->is('/') ? 'text-fisiogreen font-bold' : '' }}">Inicio</a>
            <a href="/ejercicios" class="hover:text-fisiogreen transition {{ request()->is('ejercicios') ? 'text-fisiogreen font-bold' : '' }}">Ejercicios</a>
            <a href="/cuestionario" class="hover:text-fisiogreen transition {{ request()->is('cuestionario') ? 'text-fisiogreen font-bold' : '' }}">Cuestionario</a>
            <a href="/progreso" class="hover:text-fisiogreen transition {{ request()->is('progreso') ? 'text-fisiogreen font-bold' : '' }}">Mi Progreso</a>
        </div>

        <div class="flex items-center gap-4">
            <a href="#" class="text-sm font-medium text-gray-600 hover:text-fisiogreen">Iniciar sesión</a>
            <a href="#" class="bg-fisiogreen text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-emerald-900 transition">Pedir cita</a>
        </div>
    </nav>

    <!-- Aquí es donde Laravel inyectará el contenido de las otras páginas -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Pie de página global -->
    <footer class="bg-white border-t border-gray-100 py-6 text-center text-sm text-gray-500 mt-auto">
        &copy; 2026 FisioWeb MX - Proyecto Integrador UTJ.
    </footer>

    <!-- Aquí se inyectarán scripts específicos si una página lo necesita -->
    @yield('scripts')
</body>
</html>